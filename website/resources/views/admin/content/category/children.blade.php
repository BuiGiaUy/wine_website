@extends('admin.layouts.app')

@section('title', 'Categories')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.category.index', $model_type) }}">Categories {{ $model_type }}</a></li>
        </ol>
    </nav>
@endsection
@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Children of Category: {{ $category->name }}
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Similar structure to display children categories as the main categories list -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">IMAGES</th>
                    <th class="whitespace-nowrap">CATEGORY NAME</th>
                    <th class="whitespace-nowrap">SLUG</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($children as $child)
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="{{ $child->name }}" class="tooltip rounded-full"
                                         src="{{ asset('path/to/image.jpg') }}"
                                         title="Uploaded at {{ $child->created_at }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="font-medium whitespace-nowrap">{{ $child->name }}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Tags: {{ $child->tags }}</div>
                        </td>
                        <td>
                            <a class="text-slate-500 flex items-center mr-3" href="javascript:;">
                                <i data-lucide="external-link" class="w-4 h-4 mr-2"></i> /category/{{ $model_type }}
                                /{{ $child->slug }}
                            </a>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3"
                                   href="{{ route('admin.category.edit', [$model_type, $child->id]) }}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                   data-tw-target="#delete-confirmation-modal-{{ $child->id }}">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    <!-- BEGIN: Delete Confirmation Modal -->
                    <div id="delete-confirmation-modal-{{ $child->id }}" class="modal" tabindex="-1" aria-hidden="true">
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
                                        <button type="button" data-tw-dismiss="modal"
                                                class="btn btn-outline-secondary w-24 mr-1">Cancel
                                        </button>
                                        <button type="button" class="btn btn-danger w-24 delete-category"
                                                data-category-id="{{ $child->id }}">Delete
                                        </button>
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
    </div>
@endsection
