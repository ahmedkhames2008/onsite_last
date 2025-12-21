@extends('layouts.admin-layout')

@section('title', $meal->name)

@php
    $page = "meals";
@endphp

@section('content')
<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold mb-1 text-white">
                <i class="fa-solid fa-utensils me-2 text-primary"></i>
                {{ $meal->name }}
            </h2>
            <p class="text-muted mb-0">Meal Details</p>
        </div>
        <a href="{{ route('meals.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Back
        </a>
    </div>

    <!-- Meal Card -->
    <div class="card-custom p-4" style="background-color:#102a45; border-radius:16px;">
        <div class="row g-4">
            <div class="col-md-5">
                    <img src="{{ asset('storage/'.$meal->image) }}" alt="{{ $meal->name }}" class="img-fluid rounded">
            </div>
            <div class="col-md-7 text-white">
                <h3 class="mb-3">{{ $meal->name }}</h3>

                <p>
                    <strong>Price:</strong>
                    <span class="text-info">{{ number_format($meal->price,2) }} EGP</span>
                </p>

                <p>
                    <strong>Category:</strong>
                    {{ $meal->category ? $meal->category->name : 'Uncategorized' }}
                </p>

                <p>
                    <strong>Description:</strong><br>
                    {{ $meal->description ?? 'No description available.' }}
                </p>

                <div class="mt-4">
                    <a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-primary me-2">
                        <i class="fa-solid fa-pen me-1"></i> Edit
                    </a>

                    <form action="{{ route('meals.destroy', $meal->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure to delete this meal?')" class="btn btn-danger">
                            <i class="fa-solid fa-trash me-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
