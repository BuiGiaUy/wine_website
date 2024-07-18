@extends('admin.layouts.app')
@section('title', 'Post List')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('includes.post.index') }}"> Posts </a></li>
        </ol>
    </nav>
@endsection
@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Post List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('includes.post.add') }}" class="btn btn-primary shadow-md mr-2">Add New Post</a>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="#" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                Export to Excel </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                Export to PDF </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">
                Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} entries
            </div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" id="postSearch" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">IMAGES</th>
                    <th class="whitespace-nowrap">POST NAME</th>
                    <th class="whitespace-nowrap">CATEGORY</th>
                    <th class="text-center whitespace-nowrap">VIEWS</th>
                    <th class="text-center whitespace-nowrap">RATING</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody id="postTableBody">
                @foreach($posts as $post)
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                @foreach ($post->images as $index => $image)
                                    <div class="w-10 h-10 image-fit zoom-in {{ $index > 0 ? '-ml-5' : '' }}">
                                        <img class="tooltip rounded-full" alt="{{ $image->alt }}"
                                             src="{{ $image->path }}">
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('includes.post.index', $post->id) }}"
                               class="font-medium whitespace-nowrap">{{ $post->name }}</a>
                            <div
                                class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ Str::limit($post->description, 50) }}</div>
                        </td>
                        <td class="text-center">{{ $post->category->name }}</td>
                        <td class="text-center">{{ $post->views }}</td>
                        <td class="text-center">{{ $post->rating_number }} ({{ $post->rating_value }} ratings)</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ route('includes.post.edit', $post->id) }}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                   data-tw-target="#delete-confirmation-modal-{{ $post->id }}">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    <!-- BEGIN: Delete Confirmation Modal -->
                    <div id="delete-confirmation-modal-{{ $post->id }}" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="p-5 text-center">
                                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                        <div class="text-3xl mt-5">Are you sure?</div>
                                        <div class="text-slate-500 mt-2">
                                            Do you really want to delete this post?
                                            <br>
                                            This process cannot be undone.
                                        </div>
                                    </div>
                                    <div class="px-5 pb-8 text-center">
                                        <button type="button" data-tw-dismiss="modal"
                                                class="btn btn-outline-secondary w-24 mr-1">Cancel
                                        </button>
                                        <form action="{{ route('includes.post.delete', $post->id) }}" method="POST"
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger w-24">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Delete Confirmation Modal -->
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: pagination.blade.php -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {{ $posts->links('includes.components.pagination') }}
            <select class="w-20 form-select box mt-3 sm:mt-0" onchange="window.location.href=this.value;">
                @foreach ([10, 25, 35, 50] as $size)
                    <option
                        value="{{ request()->fullUrlWithQuery(['perPage' => $size]) }}" {{ request('perPage') == $size ? 'selected' : '' }}>{{ $size }}</option>
                @endforeach
            </select>
        </div>
        <!-- END: pagination.blade.php -->
    </div>
    <script>

        $(document).ready(function () {

            // Function to filter categories based on input value
            function filterPosts() {
                var query = $('#postSearch').val().trim().toLowerCase();

                $('#postTableBody tr').each(function () {
                    var postName = $(this).find('td:nth-child(2)').text().trim().toLowerCase();
                    var parentPost = $(this).find('td:nth-child(4)').text().trim().toLowerCase();

                    // Show or hide rows based on filter condition
                    if (postName.includes(query) || parentPost.includes(query)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Attach event listener to input for real-time filtering
            $('#postSearch').on('keyup', function () {
                console.log('Search input value:', $(this).val()); // Check input value on keyup
                filterPosts()
            });

        });

    </script>
@endsection


