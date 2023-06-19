@extends('layouts.admin.master')

@section('page_content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Product
                    <a href="{{ route('product.index') }}" class="btn btn-danger btn-sm text-white  float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                @if ($errors->all())
                @foreach ($errors->all() as $error)
                <div class="text-danger mb-2">{{ $error }}</div>
                @endforeach
                @endif
                <form action="{{ route('product.update', $products->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $products->name }}" class="form-control" />
                        </div>
                        <div class="mb-3 col-6">
                            <label for="">price</label>
                            <input type="text" name="price" value="{{ $products->price }}" class="form-control" />
                        </div>

                        <div class="mb-3 col-6">
                            <label for="" class="fw-bold mb-2">Category</label>
                            <select name="category_id" class="form-control" id="category">
                                <option value="null">Select Category Name</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="" class="fw-bold mb-2">Sub Category</label>
                            <select name="sub_category_id" class="form-control" id="subcategory">
                                <option value="">Select a subcategory</option>
                                @foreach ($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}" {{ $subCategory->id == $products->sub_category_id ? 'selected' : '' }}>
                                    {{ $subCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="" class="fw-bold mb-2">Sub Sub Category</label>
                            <select name="sub_sub_category_id" class="form-control" id="subsubcategory">
                                <option value="">Select a subsubcategory</option>
                                @foreach ($subSubCategories as $subSubCategory)
                                <option value="{{ $subSubCategory->id }}" {{ $subSubCategory->id == $products->sub_sub_category_id ? 'selected' : '' }}>
                                    {{ $subSubCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="">Description</label>
                            <input type="text" name="description" value="{{ $products->description }}" class="form-control" />
                        </div>
                        <div class="mb-3 col-6">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            <img class="mt-2" height="80px" width="80px" src="{{ asset("$products->Image") }}" alt="">
                        </div>

                        <div class="mb-3 col-6">
                            <label for="">Status</label><br>
                            <input type="checkbox" name="status" {{ $products->status == '1' ? 'checked' : '' }} />
                        </div>
                        <div class="mb-3 col-12">
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Triggered when category dropdown value changes
        $('#category').change(function() {
            var category_id = $(this).val();

            // Clear the existing subcategory dropdown
            $('#subcategory').empty();
            $('#subcategory').append('<option value="">Select a subcategory</option>');

            // Make the AJAX request
            if (category_id !== '') {
                $.ajax({
                    url: "{{ route('getSubcategories', '') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#subcategory').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            }
        });

        // Triggered when subcategory dropdown value changes
        $('#subcategory').change(function() {
            var sub_category_id = $(this).val();

            // Clear the existing subsubcategory dropdown
            $('#subsubcategory').empty();
            $('#subsubcategory').append('<option value="">Select a subsubcategory</option>');

            // Make the AJAX request
            if (sub_category_id !== '') {
                $.ajax({
                    url: "{{ route('getSubSubcategories', '') }}/" + sub_category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#subsubcategory').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>
@endsection
