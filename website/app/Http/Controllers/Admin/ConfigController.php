<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Hash;

class ConfigController extends Controller
{
    // Phương thức hiển thị trang chỉnh sửa cấu hình
    public function edit(): \Illuminate\Foundation\Application|View|Factory
    {
        $config = config('website');
        return view('admin.content.setting.config', compact('config'));
    }

    // Phương thức cập nhật cấu hình
    public function update(Request $request)
    {
        $data = $request->all();
        unset($data['_token']); // Loại bỏ khóa _token khỏi mảng dữ liệu

        $config = var_export($data, true);
        $config = "<?php\n\nreturn " . $config . ";"; // Chuyển đổi cấu hình thành mã PHP

        file_put_contents(config_path('website.php'), $config); // Lưu cấu hình vào tệp

        Artisan::call('config:clear'); // Xóa bộ nhớ cache cấu hình

        return redirect()->route('admin.setting.config.edit'); // Chuyển hướng về trang chỉnh sửa cấu hình
    }

    public function profile() {
        return view('admin.content.profile.index');
    }
    public function updateProfile(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
}

