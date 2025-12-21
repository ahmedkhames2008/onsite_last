@extends("layouts.admin-layout")

@section("title","Add Meal")

@php
    $page = "meals";
@endphp

@section("content")
<div class="container-fluid">

    <div class="card-custom1" style="max-width: 100%; margin: 20px;">
        <div class="card-header mb-3 text-start">
            <h3 class="mb-0">
                <i class="fa-solid fa-utensils me-2 text-primary"></i>
                Add New Meal
            </h3>
        </div>

        <form action="{{ route('meals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Meal Name -->
            <div class="form-group mb-3 text-start">
                <label for="name" class="form-label">Meal Name</label>
                <input type="text"
                       name="name"
                       id="name"
                       value="{{ old('name') }}"
                       class="form-control"
                       placeholder="Enter meal name">

                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Price -->
            <div class="form-group mb-3 text-start">
                <label for="price" class="form-label">Price (EGP)</label>
                <input type="number"
                       name="price"
                       id="price"
                       step="0.01"
                       value="{{ old('price') }}"
                       class="form-control"
                       placeholder="Enter price">

                @error('price')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3 text-start">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-select">
                    <option value="">-- Select Category --</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group mb-4 text-start">
                <label for="image" class="form-label">Meal Image</label>
                <input type="file"
                       name="image"
                       id="image"
                       class="form-control">

                @error('image')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            
            </div>

            <div class="mb-3 text-start">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control " placeholder="Optional"></textarea>
                </div>

            <div class="d-flex justify-content-start gap-2 mt-4">
                <a href="{{ route('meals.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-xmark me-1"></i> Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-check me-1"></i> Save
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
