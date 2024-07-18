<div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">
    <!-- Breadcrumb -->
    @yield('breadcrumb')
    <!-- /Breadcrumb -->

    <!-- Search -->
    <div class="intro-x relative mr-3 sm:mr-6">
        <div class="search hidden sm:block">
            <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
            <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
        </div>
        <a class="notification sm:hidden" href="#"> <i data-lucide="search" class="notification__icon dark:text-slate-500"></i> </a>
        <div class="search-result">
            <div class="search-result__content">
                <div class="search-result__content__title">Pages</div>
                <div class="mb-5">
                    <a href="#" class="flex items-center">
                        <div class="w-8 h-8 bg-success/20 dark:bg-success/10 text-success flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="inbox"></i> </div>
                        <div class="ml-3">Mail Settings</div>
                    </a>
                    <a href="#" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="users"></i> </div>
                        <div class="ml-3">Users & Permissions</div>
                    </a>
                    <a href="#" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-primary/10 dark:bg-primary/20 text-primary/80 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-lucide="credit-card"></i> </div>
                        <div class="ml-3">Transactions Report</div>
                    </a>
                </div>
                <div class="search-result__content__title">Users</div>
{{--                <div class="mb-5">--}}
{{--                    @foreach ($users as $user)--}}
{{--                        <a href="#" class="flex items-center mt-2">--}}
{{--                            <div class="w-8 h-8 image-fit">--}}
{{--                                <img alt="User Avatar" class="rounded-full" src="{{ asset($user->avatar) }}">--}}
{{--                            </div>--}}
{{--                            <div class="ml-3">{{ $user->name }}</div>--}}
{{--                            <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">{{ $user->email }}</div>--}}
{{--                        </a>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
                <div class="search-result__content__title">Products</div>
{{--                @foreach ($products as $product)--}}
{{--                    <a href="#" class="flex items-center mt-2">--}}
{{--                        <div class="w-8 h-8 image-fit">--}}
{{--                            <img alt="Product Image" class="rounded-full" src="{{ asset($product->image) }}">--}}
{{--                        </div>--}}
{{--                        <div class="ml-3">{{ $product->name }}</div>--}}
{{--                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">{{ $product->category }}</div>--}}
{{--                    </a>--}}
{{--                @endforeach--}}
            </div>
        </div>
    </div>
    <!-- /Search -->

    <!-- Notifications -->
    <div class="intro-x dropdown mr-auto sm:mr-6">
        <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
        <div class="notification-content pt-2 dropdown-menu">
            <div class="notification-content__box dropdown-content">
                <div class="notification-content__title">Notifications</div>
{{--                @foreach ($notifications as $notification)--}}
{{--                    <div class="cursor-pointer relative flex items-center mt-5">--}}
{{--                        <div class="w-12 h-12 flex-none image-fit mr-1">--}}
{{--                            <img alt="User Avatar" class="rounded-full" src="{{ asset($notification->user->avatar) }}">--}}
{{--                            <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>--}}
{{--                        </div>--}}
{{--                        <div class="ml-2 overflow-hidden">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <a href="#" class="font-medium truncate mr-5">{{ $notification->user->name }}</a>--}}
{{--                                <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">{{ $notification->created_at->format('h:i A') }}</div>--}}
{{--                            </div>--}}
{{--                            <div class="w-full truncate text-slate-500 mt-0.5">{{ $notification->message }}</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
            </div>
        </div>
    </div>
    <!-- /Notifications -->

    <!-- Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
            <img alt="User Avatar" src="{{ asset(auth()->user()->avatar) }}">
        </div>
        <div class="dropdown-menu w-56">
            <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                    <div class="font-medium">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">{{ auth()->user()->role }}</div>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <a href="#" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item hover:bg-white/5"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <form action="{{ route('admin.auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item hover:bg-white/5">
                            <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <!-- /Account Menu -->
</div>
