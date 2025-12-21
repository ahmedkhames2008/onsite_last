@extends("layouts.admin-layout")
@section("title","Add Category")
<?php
    $page = "categories";
?>

@section("content")
<div class="">

    <div class="card-custom1" style="max-width: 100%; margin: 20px ; ">
        <div class="card-header mb-3 text-start">
            <h3>Add New Category</h3>
        </div>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3 text-start">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name">
                
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-start gap-2 mt-4">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-xmark"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-check"></i> Save
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
