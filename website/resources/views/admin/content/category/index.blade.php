@extends('layouts.adminPartialLayout')

@section('title', 'Categories')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.category.index', $model_type) }}">Categories {{ $model_type }}</a></li>
        </ol>
    </nav>
@endsection

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Categories {{ $model_type }}
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.category.add', $model_type) }}" class="btn btn-primary shadow-md mr-2">Add New Category</a>
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
            <div class="hidden md:block mx-auto text-slate-500">
                Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} entries
            </div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search..."  id="categorySearch">
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
                    <th class="whitespace-nowrap">CATEGORY NAME</th>
                    <th class="whitespace-nowrap">SLUG</th>
                    <th class="whitespace-nowrap">PARENT CATEGORY</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody id="categoryTableBody">
                @foreach ($categories as $category)
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="{{ $category->name }}" class="tooltip rounded-full" src="{{ asset('path/to/image.jpg') }}" title="Uploaded at {{ $category->created_at }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="font-medium whitespace-nowrap">{{ $category->name }}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Tags: {{ $category->tags }}</div>
                        </td>
                        <td>
                            <a class="text-slate-500 flex items-center mr-3" href="javascript:;">
                                <i data-lucide="external-link" class="w-4 h-4 mr-2"></i> /category/{{ $model_type }}/{{ $category->slug }}
                            </a>
                        </td>
                        <td>
                            @if ($category->children->isNotEmpty())
                                <a href="{{ route('admin.category.children', [$model_type, $category->id]) }}" class="text-blue-500 underline">
                                    View Children
                                </a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ route('admin.category.edit', [$model_type, $category->id]) }}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal-{{ $category->id }}">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    <!-- BEGIN: Delete Confirmation Modal -->
                    <div id="delete-confirmation-modal-{{ $category->id }}" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="p-5 text-center">
                                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                        <div class="text-3xl mt-5">Are you sure?</div>
                                        <div class="text-slate-500 mt-2">
                                            Do you really want to delete these records?
                                            <br>
                                            This process cannot be undone.
                                        </div>
                                    </div>
                                    <div class="px-5 pb-8 text-center">
                                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                        <form action="{{ route('admin.category.delete', [ $model_type ,$category->id ]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger w-24">Delete</button>
                                        </form>Delete</a>
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

        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {{ $categories->links('admin.components.pagination') }}

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

            // Function to filter categories based on input value
            function filterCategories() {
                var query = $('#categorySearch').val().trim().toLowerCase();

                $('#categoryTableBody tr').each(function() {
                    var categoryName = $(this).find('td:nth-child(2)').text().trim().toLowerCase();
                    var parentCategory = $(this).find('td:nth-child(4)').text().trim().toLowerCase();

                    // Show or hide rows based on filter condition
                    if (categoryName.includes(query) || parentCategory.includes(query)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Attach event listener to input for real-time filtering
            $('#categorySearch').on('keyup', function () {
                console.log('Search input value:', $(this).val()); // Check input value on keyup
                filterCategories()
            });

        });

    </script>

@endsection

