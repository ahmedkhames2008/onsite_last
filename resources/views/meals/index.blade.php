@extends('layouts.admin-layout')

@section('title', 'Meals')

@section('content')
<?php
$page = 'meals';

?> 


<style>
    .action-btn{
        border:1px solid rgba(255,255,255,.15);
        background:transparent;
        color:#cfd9e6;
        padding:6px 10px;
        border-radius:8px;
        transition:.25s;
    }

    .table-wrapper{
        border-radius:16px;
        overflow:hidden;
        border:1px solid #21486b;
        background:#102a45;
    }

    .table-wrapper thead{
        background:#0a1f36;
    }

    .table-wrapper th,
    .table-wrapper td{
        padding:16px;
    }

    .table-wrapper tbody tr:hover{
        background:#113459;
    }

    .action-btn.view:hover{
        background:rgba(77,163,255,.15);
        color:#4da3ff;
        border-color:#4da3ff;
    }

    .action-btn.edit:hover{
        background:rgba(0,255,170,.15);
        color:#00ffaa;
        border-color:#00ffaa;
    }

    .action-btn.delete:hover{
        background:rgba(255,77,77,.15);
        color:#ff4d4d;
        border-color:#ff4d4d;
    }

    .meal-img{
        width:60px;
        height:60px;
        object-fit:cover;
        border-radius:10px;
        border:1px solid #1e3a5f;
    }
</style>

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold mb-1 text-white">
                <i class="fa-solid fa-utensils me-2 text-primary"></i>
                Meals
            </h2>
            <p class="text-muted mb-0">View & manage all meals</p>
        </div>

        <a href="{{ route('meals.create') }}" class="btn btn-primary px-4">
            <i class="fa-solid fa-plus me-2"></i>
            Add Meal
        </a>
    </div>

    <!-- Success -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show"
             style="border-radius:12px;
             background:linear-gradient(135deg,#43e97b,#38f9d7);
             color:#fff;">
            <i class="fa-solid fa-circle-check me-1"></i>
            {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Table -->
    <div class="card-custom p-0">
        <div class="table-responsive table-wrapper">
            <table class="table align-middle mb-0 text-white">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Meal Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($meals as $meal)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $meal->name }}</td>

                        <td>
                            <img src="{{ asset('storage/'.$meal->image) }}"
                                 class="meal-img"
                                 alt="{{ $meal->name }}">
                        </td>

                        <td>
                            <span class="badge bg-info">
                                {{ $meal->category->name ?? '—' }}
                            </span>
                        </td>

                        <td>
                            <strong>{{ $meal->price }} EGP</strong>
                        </td>

                        <td class="text-center">

                            <a href="{{ route('meals.show',$meal->id) }}"
                               class="btn action-btn view me-1"
                               title="View">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <a href="{{ route('meals.edit',$meal->id) }}"
                               class="btn action-btn edit me-1"
                               title="Edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <form action="{{ route('meals.destroy',$meal->id) }}"
                                  method="POST"
                                  style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure you want to delete this meal?')"
                                        class="btn action-btn delete"
                                        title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            No meals found
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
