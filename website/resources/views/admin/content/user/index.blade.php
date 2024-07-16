@extends('layouts.adminPartialLayout')

@section('title', 'Users')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
        </ol>
    </nav>
@endsection

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Users Management
    </h2>
    <div  class="grid grid-cols-12 gap-6 mt-5">
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
                        <li><a href="#" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print </a></li>
                        <li><a href="#" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a></li>
                        <li><a href="#" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a></li>
                    </ul>
                </div>
            </div>

            <!-- Pagination and Total Entries -->
            <div class="hidden md:block mx-auto text-slate-500">
                Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
            </div>

            <!-- Search Input -->
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search..." id="userSearch">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>


        @foreach ($users as $user)
            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 users-div">
                <div class="box">
                    <div class="flex items-start px-5 pt-5">
                        <div class="w-full flex flex-col lg:flex-row items-center">
                            <div class="w-16 h-16 image-fit">
                                <img alt="{{ $user->name }}" class="rounded-full" src="{{asset('images/avatar.jpg')}}">
                            </div>
                            <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                                <a href="#" class="font-medium user-a" >{{ $user->name }}</a>
                                <div class="text-slate-500 text-xs mt-0.5">{{ $user->role }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center lg:text-left p-5">
                        <div>{{ $user->bio }}</div>
                        <div class="flex items-center justify-center lg:justify-start text-slate-500 mt-5">
                            <i data-lucide="mail" class="w-3 h-3 mr-2"></i> {{ $user->email }}
                        </div>
                        <div class="flex items-center justify-center lg:justify-start text-slate-500 mt-1">
                            <i data-lucide="instagram" class="w-3 h-3 mr-2"></i> {{ $user->social_profile }}
                        </div>
                    </div>
                    <div class="text-center lg:text-right p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                        <button class="btn btn-primary py-1 px-2 mr-2">Message</button>
                        <a href="" class="btn btn-outline-secondary py-1 px-2">Profile</a>
                    </div>
                </div>
            </div>

        @endforeach

        <!-- END: Data List -->

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
        $(document).ready(function() {

            // Function to filter users based on input value
            function filterUsers() {
                var query = $('#userSearch').val().trim().toLowerCase();

                $('#userDiv .users-div ').each(function() {
                    var userName = $(this).find('.user-a').val().trim().toLowerCase();

                    // Show or hide rows based on filter condition
                    if (userName.includes(query) || userEmail.includes(query)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Attach event listener to input for real-time filtering
            $('#userSearch').on('keyup', function () {
                console.log('Search input value:', $(this).val()); // Check input value on keyup
                filterUsers();
            });

        });
    </script>

@endsection
