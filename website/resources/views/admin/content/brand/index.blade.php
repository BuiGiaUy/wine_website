@extends('layouts.adminPartialLayout')

@section('title', 'Brands')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.brand.index') }}">Brands</a></li>
        </ol>
    </nav>
@endsection

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Brands
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.brand.add') }}" class="btn btn-primary shadow-md mr-2">Add New Brand</a>
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
                Showing {{ $brands->firstItem() }} to {{ $brands->lastItem() }} of {{ $brands->total() }} entries
            </div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search..."  id="brandSearch">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>

        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">Logo</th>
                    <th class="whitespace-nowrap">Brand Name</th>
                    <th class="whitespace-nowrap">Description</th>
                    <th class="text-center whitespace-nowrap">Actions</th>
                </tr>
                </thead>
                <tbody id="brandTableBody">
                @foreach ($brands as $brand)
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex items-center">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img src="{{ asset('path/to/brand/logo.jpg') }}" alt="{{ $brand->name }}" class="tooltip rounded-full" title="Added at {{ $brand->created_at }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="font-medium whitespace-nowrap">{{ $brand->name }}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Tags: {{ $brand->tags }}</div>
                        </td>
                        <td>
                            <span class="text-slate-500">{{ $brand->description }}</span>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a href="{{ route('admin.brand.edit', $brand->id) }}" class="flex items-center mr-3">
                                    <i class="w-4 h-4 mr-1" data-lucide="check-square"></i> Edit
                                </a>
                                <a href="javascript:;" class="flex items-center text-danger" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal-{{ $brand->id }}">
                                    <i class="w-4 h-4 mr-1" data-lucide="trash-2"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    <!-- BEGIN: Delete Confirmation Modal -->
                    <div id="delete-confirmation-modal-{{ $brand->id }}" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="p-5 text-center">
                                        <i class="w-16 h-16 text-danger mx-auto mt-3" data-lucide="x-circle"></i>
                                        <div class="text-3xl mt-5">Are you sure?</div>
                                        <div class="text-slate-500 mt-2">
                                            Do you really want to delete this brand?
                                            <br>
                                            This action cannot be undone.
                                        </div>
                                    </div>
                                    <div class="px-5 pb-8 text-center">
                                        <button type="button" class="btn btn-outline-secondary w-24 mr-1" data-tw-dismiss="modal">Cancel</button>
                                        <a href="{{ route('admin.brand.delete',  $brand->id) }}" class="btn btn-danger w-24 delete-brand" data-brand-id="{{ $brand->id }}">Delete</a>
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
            {{ $brands->links('admin.components.pagination') }}

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
            // Function to filter brands based on input value
            function filterBrands() {
                var query = $('#brandSearch').val().trim().toLowerCase();

                $('#brandTableBody tr').each(function() {
                    var brandName = $(this).find('td:nth-child(2)').text().trim().toLowerCase();
                    var description = $(this).find('td:nth-child(3)').text().trim().toLowerCase();

                    if (brandName.includes(query) || description.includes(query)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Attach event listener to input for real-time filtering
            $('#brandSearch').on('keyup', function () {
                filterBrands();
            });

        });
    </script>

@endsection
