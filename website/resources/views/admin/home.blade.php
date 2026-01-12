@extends('admin.layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Báo cáo tổng quan
                        </h2>
                        <a href="#" data-reload-btn class="ml-auto flex items-center text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="refresh-ccw" data-lucide="refresh-ccw"
                                 class="lucide lucide-refresh-ccw w-4 h-4 mr-3">
                                <path d="M3 2v6h6"></path>
                                <path d="M21 12A9 9 0 006 5.3L3 8"></path>
                                <path d="M21 22v-6h-6"></path>
                                <path d="M3 12a9 9 0 0015 6.7l3-2.7"></path>
                            </svg>
                            Làm mới </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <!-- Card 1: Đơn đã bán -->
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round" icon-name="shopping-cart"
                                             data-lucide="shopping-cart"
                                             class="lucide lucide-shopping-cart report-box__icon text-primary">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path>
                                        </svg>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6" data-stat="total-orders">{{ number_format($totalOrders) }}</div>
                                    <div class="text-base text-slate-500 mt-1">Đơn đã bán</div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2: Tổng đơn hàng -->
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round" icon-name="credit-card"
                                             data-lucide="credit-card"
                                             class="lucide lucide-credit-card report-box__icon text-pending">
                                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                        </svg>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ number_format($totalOrders) }}</div>
                                    <div class="text-base text-slate-500 mt-1">Tổng đơn hàng</div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3: Tổng sản phẩm -->
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round" icon-name="package"
                                             data-lucide="package"
                                             class="lucide lucide-package report-box__icon text-warning">
                                            <path d="M16.5 9.4l-9-5.19M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"></path>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6" data-stat="total-products">{{ number_format($totalProducts) }}</div>
                                    <div class="text-base text-slate-500 mt-1">Tổng sản phẩm</div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 4: Tổng doanh thu -->
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round" icon-name="dollar-sign"
                                             data-lucide="dollar-sign"
                                             class="lucide lucide-dollar-sign report-box__icon text-success">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"></path>
                                        </svg>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6" data-stat="total-revenue">{{ number_format($totalRevenue, 0, ',', '.') }}đ</div>
                                    <div class="text-base text-slate-500 mt-1">Tổng doanh thu</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->

                <!-- BEGIN: Sales Report -->
                <div class="col-span-12 lg:col-span-6 mt-8">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Báo cáo doanh thu
                        </h2>
                    </div>
                    <div class="intro-y box p-5 mt-5">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <div class="flex">
                                <div>
                                    <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium" data-stat="this-month">
                                        {{ number_format($thisMonthRevenue, 0, ',', '.') }}đ
                                    </div>
                                    <div class="mt-0.5 text-slate-500">Tháng này</div>
                                </div>
                                <div class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5"></div>
                                <div>
                                    <div class="text-slate-500 text-lg xl:text-xl font-medium" data-stat="last-month">{{ number_format($lastMonthRevenue, 0, ',', '.') }}đ</div>
                                    <div class="mt-0.5 text-slate-500">Tháng trước</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Sales Report -->

                <!-- BEGIN: Latest Orders Summary -->
                <div class="col-span-12 lg:col-span-6 mt-8">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Đơn hàng mới nhất
                        </h2>
                        <a href="{{ route('admin.orders.index') }}" class="ml-auto text-primary truncate">Xem tất cả</a>
                    </div>
                    <div class="intro-y box p-5 mt-5" data-orders-container>
                        @forelse($latestOrders as $order)
                        <div class="flex items-center {{ !$loop->last ? 'mb-4 pb-4 border-b border-slate-200 dark:border-darkmode-300' : '' }}">
                            <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden bg-primary/10 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-5 h-5 text-primary">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">{{ $order->user->name ?? 'Khách hàng #' . $order->user_id }}</div>
                                <div class="text-slate-500 text-xs mt-0.5">{{ $order->created_at->format('d/m/Y H:i') }}</div>
                            </div>
                            <div class="text-success font-medium">+{{ number_format($order->total_amount, 0, ',', '.') }}đ</div>
                        </div>
                        @empty
                        <div class="text-center text-slate-500 py-4">
                            Chưa có đơn hàng nào
                        </div>
                        @endforelse
                    </div>
                </div>
                <!-- END: Latest Orders Summary -->
            </div>
        </div>

        <!-- BEGIN: Sidebar -->
        <div class="col-span-12 2xl:col-span-3">
            <div class="2xl:border-l -mb-10 pb-10">
                <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                    <!-- BEGIN: Quick Links -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Truy cập nhanh
                            </h2>
                        </div>
                        <div class="mt-5">
                            <a href="{{ route('admin.product.index') }}" class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden bg-primary/10 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-5 h-5 text-primary">
                                            <path d="M16.5 9.4l-9-5.19M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"></path>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg>
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Quản lý sản phẩm</div>
                                        <div class="text-slate-500 text-xs mt-0.5">{{ $totalProducts }} sản phẩm</div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-5 h-5 text-slate-500">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <a href="{{ route('admin.orders.index') }}" class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden bg-pending/10 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-bag w-5 h-5 text-pending">
                                            <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"></path>
                                            <line x1="3" y1="6" x2="21" y2="6"></line>
                                            <path d="M16 10a4 4 0 01-8 0"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Quản lý đơn hàng</div>
                                        <div class="text-slate-500 text-xs mt-0.5">{{ $totalOrders }} đơn hàng</div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-5 h-5 text-slate-500">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <a href="{{ route('admin.brand.index') }}" class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden bg-warning/10 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag w-5 h-5 text-warning">
                                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"></path>
                                            <line x1="7" y1="7" x2="7.01" y2="7"></line>
                                        </svg>
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Quản lý thương hiệu</div>
                                        <div class="text-slate-500 text-xs mt-0.5">Thương hiệu rượu</div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-5 h-5 text-slate-500">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <a href="{{ route('admin.category.index', 'product') }}" class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden bg-success/10 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layers w-5 h-5 text-success">
                                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                            <polyline points="2 17 12 22 22 17"></polyline>
                                            <polyline points="2 12 12 17 22 12"></polyline>
                                        </svg>
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Quản lý danh mục</div>
                                        <div class="text-slate-500 text-xs mt-0.5">Danh mục sản phẩm</div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-5 h-5 text-slate-500">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <a href="{{ route('admin.users.index') }}" class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden bg-danger/10 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-5 h-5 text-danger">
                                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 00-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 010 7.75"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Quản lý người dùng</div>
                                        <div class="text-slate-500 text-xs mt-0.5">{{ $totalUsers }} người dùng</div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-5 h-5 text-slate-500">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END: Quick Links -->

                    <!-- BEGIN: Notifications -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Thông báo
                            </h2>
                        </div>
                        <div class="mt-5">
                            @if($newOrdersToday > 0)
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden bg-success/10 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart w-5 h-5 text-success">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Đơn hàng mới hôm nay</div>
                                        <div class="text-slate-500 text-xs mt-0.5">{{ $newOrdersToday }} đơn hàng mới</div>
                                    </div>
                                    <span class="px-2 py-1 rounded-full text-xs bg-success text-white font-medium">Mới</span>
                                </div>
                            </div>
                            @endif

                            @if($pendingOrders > 0)
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden bg-warning/10 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-5 h-5 text-warning">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Đơn hàng chờ xử lý</div>
                                        <div class="text-slate-500 text-xs mt-0.5">{{ $pendingOrders }} đơn đang chờ</div>
                                    </div>
                                    <span class="px-2 py-1 rounded-full text-xs bg-warning text-white font-medium">Chờ</span>
                                </div>
                            </div>
                            @endif

                            @if($newUsersThisWeek > 0)
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden bg-primary/10 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-plus w-5 h-5 text-primary">
                                            <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle>
                                            <line x1="20" y1="8" x2="20" y2="14"></line>
                                            <line x1="23" y1="11" x2="17" y2="11"></line>
                                        </svg>
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Người dùng mới</div>
                                        <div class="text-slate-500 text-xs mt-0.5">{{ $newUsersThisWeek }} người trong tuần</div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if($newOrdersToday == 0 && $pendingOrders == 0 && $newUsersThisWeek == 0)
                            <div class="intro-x">
                                <div class="box px-5 py-3 flex items-center justify-center">
                                    <div class="text-slate-500 text-sm">Không có thông báo mới</div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- END: Notifications -->
                </div>
            </div>
        </div>
        <!-- END: Sidebar -->
    </div>

    @push('scripts')
    <script>
        // Dashboard API Integration
        const DashboardAPI = {
            baseUrl: '/api/admin/dashboard',
            
            async fetchDashboardData() {
                try {
                    const response = await fetch(`${this.baseUrl}/data`);
                    if (!response.ok) throw new Error('Failed to fetch dashboard data');
                    const result = await response.json();
                    return result.data;
                } catch (error) {
                    console.error('Error fetching dashboard data:', error);
                    throw error;
                }
            }
        };

        function formatNumber(num) {
            return new Intl.NumberFormat('vi-VN').format(num);
        }

        function animateValue(element, start, end, duration = 500) {
            const range = end - start;
            const increment = range / (duration / 16);
            let current = start;
            
            const timer = setInterval(() => {
                current += increment;
                if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
                    current = end;
                    clearInterval(timer);
                }
                element.textContent = formatNumber(Math.floor(current));
            }, 16);
        }

        function updateStatistics(stats) {
            const totalOrdersEl = document.querySelector('[data-stat="total-orders"]');
            if (totalOrdersEl) {
                const currentValue = parseInt(totalOrdersEl.textContent.replace(/\D/g, '')) || 0;
                animateValue(totalOrdersEl, currentValue, stats.totalOrders);
            }

            const totalProductsEl = document.querySelector('[data-stat="total-products"]');
            if (totalProductsEl) {
                const currentValue = parseInt(totalProductsEl.textContent.replace(/\D/g, '')) || 0;
                animateValue(totalProductsEl, currentValue, stats.totalProducts);
            }

            const totalRevenueEl = document.querySelector('[data-stat="total-revenue"]');
            if (totalRevenueEl) {
                totalRevenueEl.textContent = formatNumber(stats.totalRevenue) + 'đ';
            }

            const thisMonthEl = document.querySelector('[data-stat="this-month"]');
            if (thisMonthEl) {
                thisMonthEl.textContent = formatNumber(stats.thisMonthRevenue) + 'đ';
            }

            const lastMonthEl = document.querySelector('[data-stat="last-month"]');
            if (lastMonthEl) {
                lastMonthEl.textContent = formatNumber(stats.lastMonthRevenue) + 'đ';
            }
        }

        function updateLatestOrders(orders) {
            const container = document.querySelector('[data-orders-container]');
            if (!container) return;

            container.innerHTML = '';

            if (orders.length === 0) {
                container.innerHTML = '<div class="text-center text-slate-500 py-4">Chưa có đơn hàng nào</div>';
                return;
            }

            orders.forEach((order, index) => {
                const isLast = index === orders.length - 1;
                const orderHtml = `
                    <div class="flex items-center ${!isLast ? 'mb-4 pb-4 border-b border-slate-200 dark:border-darkmode-300' : ''}">
                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden bg-primary/10 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-5 h-5 text-primary">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="ml-4 mr-auto">
                            <div class="font-medium">${order.user_name}</div>
                            <div class="text-slate-500 text-xs mt-0.5">${order.created_at}</div>
                        </div>
                        <div class="text-success font-medium">+${formatNumber(order.total_amount)}đ</div>
                    </div>
                `;
                container.insertAdjacentHTML('beforeend', orderHtml);
            });
        }

        async function reloadDashboard() {
            const reloadBtn = document.querySelector('[data-reload-btn]');
            const icon = reloadBtn?.querySelector('svg');
            
            try {
                if (icon) icon.classList.add('animate-spin');
                if (reloadBtn) reloadBtn.style.pointerEvents = 'none';

                const data = await DashboardAPI.fetchDashboardData();
                updateStatistics(data.statistics);
                updateLatestOrders(data.latestOrders);

            } catch (error) {
                console.error('Failed to reload dashboard:', error);
                alert('Không thể tải lại dữ liệu. Vui lòng thử lại!');
            } finally {
                if (icon) icon.classList.remove('animate-spin');
                if (reloadBtn) reloadBtn.style.pointerEvents = 'auto';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const reloadBtn = document.querySelector('[data-reload-btn]');
            if (reloadBtn) {
                reloadBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    reloadDashboard();
                });
            }
        });
    </script>
    @endpush
@endsection
