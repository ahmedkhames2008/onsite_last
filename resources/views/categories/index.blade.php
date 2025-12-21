@extends('layouts.admin-layout')

@section('title', 'Categories')

@section('content')
<?php
    $page = 'categories';
    ?>
<style>
    /* Table rows */
    .table-row {
        transition: all 0.3s ease;
    }




    /* Action buttons */
    .action-btn {
        border: 1px solid rgba(255, 255, 255, 0.15);
        background: transparent;
        color: #cfd9e6;
        padding: 6px 10px;
        border-radius: 8px;
        transition: all 0.25s ease;
    }

    .table-wrapper {
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #21486b;
        background-color: #102a45;
    }

    /* Header */
    .table-wrapper thead {
        background-color: #0a1f36;
    }

    /* Cells */
    .table-wrapper th,
    .table-wrapper td {
        padding: 16px;
    }

    /* Row hover */
    .table-wrapper tbody tr:hover {
        background-color: #113459;
    }


    .action-btn.view:hover {
        background: rgba(77, 163, 255, 0.15);
        color: #4da3ff;
        border-color: #4da3ff;
    }

    .action-btn.edit:hover {
        background: rgba(0, 255, 170, 0.15);
        color: #00ffaa;
        border-color: #00ffaa;
    }

    .action-btn.delete:hover {
        background: rgba(255, 77, 77, 0.15);
        color: #ff4d4d;
        border-color: #ff4d4d;
    }
</style>
<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold mb-1 text-white">
                <i class="fa-solid fa-chart-column me-2 text-primary"></i>
                Categories
            </h2>
            <p class="text-muted mb-0">View & manage all categories</p>
        </div>

        <a href={{ route('categories.create') }} class="btn btn-primary px-4">
            <i class="fa-solid fa-plus me-2"></i>
            Add Category
        </a>
    </div>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert"
        style="border-radius: 12px; background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: #fff; padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Card -->
    <div class="card-custom p-0">

        <div class="table-responsive table-wrapper">
            <table class="table  align-middle mb-0 text-white">

                <thead style="background:#0a1f36;">
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th class="text-center pe-4">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <!-- Row -->
                    @foreach($categories as $category)

                    <tr class="table-row">
                        <td class="ps-4">{{ $loop->iteration }}</td>
                        <td>
                            <div class="fw-semibold">{{ $category->name }}</div>
                        </td>
                        <td>
                            {{ $category->slug }}
                        </td>
                        <td class=" pe-4">
                            <button class="btn action-btn view me-1" data-bs-toggle="modal" data-bs-target="#categoryModal{{ $category->id }}" title="View">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <a href={{ route("categories.edit",$category->id) }} class="btn action-btn edit me-1"  title="Edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                           <form style="display:inline" action="{{ route('categories.destroy',$category->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button onclick="return confirm('Are You Sure To Delete This Category?') " class="btn action-btn delete" title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                           </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            @foreach($categories as $category)
            <div class="modal fade" id="categoryModal{{ $category->id }}" tabindex="-1"
                aria-labelledby="categoryModalLabel{{ $category->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: #102a45; color: #fff; border-radius: 12px;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="categoryModalLabel{{ $category->id }}">Category Details</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Name:</strong> {{ $category->name }}</p>
                            <p><strong>Slug:</strong> {{ $category->slug }}</p>
                            <p><strong>Created at:</strong> {{ $category->created_at->format('d M Y') }}</p>
                            <p><strong>Updated at:</strong> {{ $category->updated_at->format('d M Y') }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>

</div>

@endsection