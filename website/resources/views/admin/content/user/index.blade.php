@extends('admin.layouts.app')

@section('title', 'Quản lý người dùng')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Người dùng</a></li>
        </ol>
    </nav>
@endsection

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Quản lý người dùng
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <!-- Dropdown Menu -->
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li><a href="#" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> In</a></li>
                        <li><a href="#" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Xuất Excel</a></li>
                        <li><a href="#" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Xuất PDF</a></li>
                    </ul>
                </div>
            </div>

            <!-- Total Entries -->
            <div class="hidden md:block mx-auto text-slate-500">
                Hiển thị {{ $users->firstItem() ?? 0 }} đến {{ $users->lastItem() ?? 0 }} của {{ $users->total() }} người dùng
            </div>

            <!-- Search Input -->
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Tìm kiếm..." id="userSearch">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>

        <!-- Users Grid -->
        <div class="intro-y col-span-12" id="usersContainer">
            <div class="grid grid-cols-12 gap-6">
                @forelse ($users as $user)
                    <div class="col-span-12 md:col-span-6 lg:col-span-4 user-card" data-name="{{ strtolower($user->name) }}" data-email="{{ strtolower($user->email) }}">
                        <div class="box">
                            <div class="flex items-start px-5 pt-5">
                                <div class="w-full flex flex-col lg:flex-row items-center">
                                    <div class="w-16 h-16 image-fit">
                                        <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user w-8 h-8 text-primary">
                                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="font-medium">{{ $user->name }}</a>
                                        <div class="text-slate-500 text-xs mt-0.5">
                                            @if($user->email_verified_at)
                                                <span class="text-success">Đã xác thực</span>
                                            @else
                                                <span class="text-warning">Chưa xác thực</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center lg:text-left p-5">
                                <div class="flex items-center justify-center lg:justify-start text-slate-500">
                                    <i data-lucide="mail" class="w-3 h-3 mr-2"></i> {{ $user->email }}
                                </div>
                                <div class="flex items-center justify-center lg:justify-start text-slate-500 mt-1">
                                    <i data-lucide="calendar" class="w-3 h-3 mr-2"></i> Tham gia: {{ $user->created_at->format('d/m/Y') }}
                                </div>
                            </div>
                            <div class="text-center lg:text-right p-5 border-t border-slate-200/60 dark:border-darkmode-400 flex justify-end gap-2">
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary py-1 px-2">
                                    <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Xem
                                </a>
                                <button type="button" class="btn btn-danger py-1 px-2" data-tw-toggle="modal" data-tw-target="#delete-modal-{{ $user->id }}">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div id="delete-modal-{{ $user->id }}" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="p-5 text-center">
                                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                        <div class="text-3xl mt-5">Xác nhận xóa?</div>
                                        <div class="text-slate-500 mt-2">
                                            Bạn có chắc muốn xóa người dùng <strong>{{ $user->name }}</strong>?
                                            <br>
                                            Hành động này không thể hoàn tác.
                                        </div>
                                    </div>
                                    <div class="px-5 pb-8 text-center">
                                        <button type="button" class="btn btn-outline-secondary w-24 mr-1" data-tw-dismiss="modal">Hủy</button>
                                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger w-24">Xóa</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-12">
                        <div class="box p-5 text-center text-slate-500">
                            Chưa có người dùng nào
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        <!-- END: Users Grid -->

        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {{ $users->links('admin.components.pagination') }}

            <select class="w-20 form-select box mt-3 sm:mt-0" onchange="window.location.href=this.value;">
                @foreach ([10, 25, 35, 50] as $size)
                    <option value="{{ request()->fullUrlWithQuery(['perPage' => $size]) }}" {{ request('perPage') == $size ? 'selected' : '' }}>{{ $size }}</option>
                @endforeach
            </select>
        </div>
        <!-- END: Pagination -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('userSearch');
            const userCards = document.querySelectorAll('.user-card');

            searchInput.addEventListener('keyup', function () {
                const query = this.value.trim().toLowerCase();

                userCards.forEach(function (card) {
                    const name = card.dataset.name || '';
                    const email = card.dataset.email || '';

                    if (name.includes(query) || email.includes(query)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
