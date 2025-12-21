@extends("layouts.admin-layout")

@section("title","Edit Meal")

@php
    $page = "meals";
@endphp

@section("content")
<div class="container-fluid">

    <div class="card-custom1" style="max-width: 100%; margin: 20px;">
        <div class="card-header mb-3 text-start">
            <h3 class="mb-0">
                <i class="fa-solid fa-utensils me-2 text-primary"></i>
                Edit Meal
            </h3>
        </div>

        <form action="{{ route('meals.update', $meal->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Meal Name -->
            <div class="form-group mb-3 text-start">
                <label for="name" class="form-label">Meal Name</label>
                <input type="text"
                       name="name"
                       id="name"
                       value="{{ old('name', $meal->name) }}"
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
                       value="{{ old('price', $meal->price) }}"
                       class="form-control"
                       placeholder="Enter price">

                @error('price')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Category -->
            <div class="form-group mb-3 text-start">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-select">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $meal->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Current Image -->
            <div class="form-group mb-3 text-start">
                <label class="form-label">Current Image</label><br>
                    <img src="{{ asset('storage/'.$meal->image) }}" alt="Meal Image" class="img-thumbnail" style="max-width:200px;">
                
            </div>

            <!-- Upload New Image -->
            <div class="form-group mb-4 text-start">
                <label for="image" class="form-label">Upload New Image (optional)</label>
                <input type="file"
                       name="image"
                       id="image"
                       class="form-control">

                @error('image')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3 text-start">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" placeholder="Optional">{{ old('description', $meal->description) }}</textarea>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-start gap-2 mt-4">
                <a href="{{ route('meals.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-xmark me-1"></i> Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-check me-1"></i> Update
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
