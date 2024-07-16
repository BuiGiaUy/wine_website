@extends('layouts.adminPartialLayout')

@section('title', 'Product List')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}"> Products </a></li>
        </ol>
    </nav>
@endsection

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Product List
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('admin.product.add') }}" class="btn btn-primary shadow-md mr-2">Add New Product</a>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">
                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries
            </div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search..." id="productSearch">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- Product Cards -->
        <!-- Replace this section with a loop to display products -->
        <div id="productTableBody">
            @foreach($products as $product)
                <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3 product-cart">
                    <div class="box">
                        <div class="p-5">
                            <div class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                                <!-- Replace 'src' attribute with product image URL -->
                                @if ($product->images->isNotEmpty())
                                    <img src="{{ asset($product->images->first()->path) }}" class="rounded-md" alt="{{ $product->images->first()->alt }}">
                                @else
                                    <img src="{{ asset('path_to_default_image.jpg') }}" class="rounded-md" alt="No Image">
                                @endif
                                <!-- Example: <img alt="Product Image" class="rounded-md" src="dist/images/product-1.jpg"> -->
                                <span class="absolute top-0 bg-pending/80 text-white text-xs m-5 px-2 py-1 rounded z-10">Featured</span>
                                <div class="absolute bottom-0 text-white px-5 pb-6 z-10">
                                    <a href="{{ route('admin.product.index', $product->id) }}" class="block font-medium text-base product-name">{{ $product->name }}</a>
                                    <span class="text-white/90 text-xs mt-3">{{ $product->category }}</span>
                                </div>
                            </div>
                            <div class="text-slate-600 dark:text-slate-500 mt-5">
                                <div class="flex items-center">
                                    <i data-lucide="link" class="w-4 h-4 mr-2"></i>
                                    <!-- Replace 'price' with product price -->
                                    Price: ${{ $product->price }}
                                </div>
                                <div class="flex items-center mt-2">
                                    <i data-lucide="layers" class="w-4 h-4 mr-2"></i>
                                    <!-- Replace 'quantity' with product quantity -->
                                    Remaining Stock: {{ $product->quantity }}
                                </div>
                                <div class="flex items-center mt-2">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                                    <!-- Replace 'status' with product status -->
                                    Status: {{ $product->status }}
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                            <a class="flex items-center text-primary mr-auto" href="{{ route('admin.product.index', $product->id) }}">
                                <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                Preview
                            </a>
                            <a class="flex items-center mr-3" href="{{ route('admin.product.edit', $product->id) }}">
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>
                                Edit
                            </a>
                            <button class="flex items-center text-danger" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal-{{ $product->id }}">
                                <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
                <!-- BEGIN: Delete Confirmation Modal -->
                <div id="delete-confirmation-modal-{{ $product->id }}" class="modal" tabindex="-1" aria-hidden="true">
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
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                    <form action="{{ route('admin.product.delete', $product->id) }}" method="POST" style="display:inline;">
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

        </div>
        <!-- End Product Cards -->

        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {{ $products->links('admin.components.pagination') }}
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
                var query = $('#productSearch').val().trim().toLowerCase();

                $('#productTableBody product-cart').each(function() {
                    var productName = $(this).find('.product-name').text().trim().toLowerCase();

                    // Show or hide rows based on filter condition
                    if (productName.includes(query)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Attach event listener to input for real-time filtering
            $('#productSearch').on('keyup', function () {
                console.log('Search input value:', $(this).val()); // Check input value on keyup
                filterCategories()
            });

        });

    </script>

@endsection
