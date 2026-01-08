<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\User;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        // Apply auth middleware only to actions that require authentication
        $this->middleware('auth');
    }
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->paginate(10);
        return view('content.orders.index', ['orders' => $orders]);
    }
    public function checkout()
    {
        $user = User::find(auth()->id());

        $userID = auth()->id(); // Get the current authenticated user's ID
        $cartItems = Cart::session($userID)->getContent();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('message', 'Your cart is empty.');
        }
        $total = $subtotal + 30000;
        // Check if user information exists
        if ($user->info->id) {
            return view('content.cart.checkout', ['cartItems'=> $cartItems, 'subtotal'=>$subtotal, "user"=>$user,"total"=>$total]);
        } else {
            // Redirect to the cart.info page to complete user information
            return redirect()->route('cart.info');
        }
    }
    public function checkoutVNPay () {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://winewebsite.th/cart/checkout-complete";
        $vnp_TmnCode = "GTIRHD0X";//Mã website tại VNPAY
        $vnp_HashSecret = "VNS34LU4SQJOM2W93BUYJMXU1YH4URQS"; //Chuỗi bí mật


        $payment = $this->createPaymentRecord($_POST['total_amount']);


        $vnp_TxnRef = $payment->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã nàysang VNPAY
        $vnp_OrderInfo = 'Payment for Order #' . $payment->id;
        $vnp_OrderType = 'billPayment';
        $vnp_Amount = $_POST['total_amount'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
//        $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            return redirect($vnp_Url);

        } else {
            echo json_encode($returnData);
        }

        // Redirect to VNPay
    }

    public function checkoutCash (Request $request) {

        $totalAmount = $request->input(['total_amount']);
        $payment = $this->createPaymentRecord($totalAmount);

        if ($payment) {
            // Update payment status to 'completed'
            $payment->status = 'completed';
            $payment->save();

            // Optionally create an order
            $this->createOrder($payment);

            return view('content.cart.checkout-complete', ['payment'=>$payment])->with('success', 'Payment successful');
        } else {
            return redirect()->route('cart.index')->with('error', 'Payment not found');
        }
    }
    protected function createOrder(Payment $payment)
    {
        $userID = Auth::id();
        $cartItems = Cart::session($userID)->getContent();

        $totalAmount = $payment->amount ;
        $discount = 0;
        $total = $totalAmount - $discount;

        $order = Order::create([
            'user_id' => $userID,
            'payment_id' => $payment->id,
            'total' => $total,
            'discount' => $discount,
            'total_amount' => $totalAmount,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id, // Ensure this is the product ID from the cart item
                'quantity' => $item->quantity,
                'price' => $item->price,
                'discount' => 0, // Adjust as necessary
            ]);
        }

        Cart::session($userID)->clear();
    }

    public function createPaymentRecord($totalAmount)
    {
        // Create a new payment record
        $payment = Payment::create([
            'amount' => $totalAmount , // Convert to cents
            'status' => 'pending', // Initial status
        ]);

        return $payment; // Return the payment ID
    }

    public function checkoutComplete(Request $request)
    {
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        $vnp_TxnRef = $request->input('vnp_TxnRef'); // The payment ID

        // Verify the payment result
        if ($vnp_ResponseCode == '00') {
            // Find the payment record by ID
            $payment = Payment::where('id', $vnp_TxnRef)->first();

            if ($payment) {
                // Update payment status to 'completed'
                $payment->status = 'completed';
                $payment->save();

                // Optionally create an order
                $this->createOrder($payment);

                return view('content.cart.checkout-complete', ['payment'=>$payment])->with('success', 'Payment successful');
            } else {
                return redirect()->route('cart.index')->with('error', 'Payment not found');
            }
        } else {
            return redirect()->route('cart.index')->with('error', 'Payment failed');
        }
    }

    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('content.orders.show', ['order' => $order]);
    }
}
