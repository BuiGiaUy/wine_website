<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

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
}

