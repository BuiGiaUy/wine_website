<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - {{ config('app.name', 'Wine Website') }}</title>
    
    <link rel="stylesheet" href="{{ asset('backend/dist/css/app.css') }}" />

</head>
<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Logo" class="w-6" src="{{ asset('backend/dist/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3"> Wine <span class="font-medium">Admin</span> </span>
                </a>
                <div class="my-auto">
                    <img alt="Illustration" class="-intro-x w-1/2 -mt-16" src="{{ asset('backend/dist/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        Quản lý cửa hàng rượu
                        <br>
                        của bạn dễ dàng hơn
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">
                        Quản lý sản phẩm, đơn hàng và khách hàng tất cả trong một nơi
                    </div>
                </div>
            </div>
            <!-- END: Login Info -->
            
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Đăng nhập Admin
                    </h2>
                    <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">
                        Quản lý cửa hàng rượu của bạn
                    </div>
                    
                    @if ($errors->any())
                        <div class="intro-x mt-5">
                            <div class="alert alert-danger show mb-2" role="alert">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="intro-x mt-8">
                            <input type="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   class="intro-x login__input form-control py-3 px-4 block @error('email') border-danger @enderror" 
                                   placeholder="Email"
                                   required 
                                   autofocus>
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="intro-x mt-4">
                            <input type="password" 
                                   name="password"
                                   class="intro-x login__input form-control py-3 px-4 block @error('password') border-danger @enderror" 
                                   placeholder="Password"
                                   required>
                            @error('password')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input id="remember-me" 
                                       name="remember" 
                                       type="checkbox" 
                                       class="form-check-input border mr-2"
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="cursor-pointer select-none" for="remember-me">Ghi nhớ đăng nhập</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                            @endif
                        </div>
                        
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 align-top">
                                Đăng nhập
                            </button>
                        </div>
                    </form>
                    
                    <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left">
                        Bằng việc đăng nhập, bạn đồng ý với
                        <a class="text-primary dark:text-slate-200" href="#">Điều khoản và Điều kiện</a> 
                        & 
                        <a class="text-primary dark:text-slate-200" href="#">Chính sách bảo mật</a>
                    </div>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    
    <!-- BEGIN: JS Assets-->
    <script src="{{ asset('backend/dist/js/app.js') }}"></script>
    <!-- END: JS Assets-->
</body>
</html>
