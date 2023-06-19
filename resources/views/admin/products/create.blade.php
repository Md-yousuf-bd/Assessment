@extends('layouts.admin.master')
@section('page_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>product
                        <a href="{{ route('product.index') }}" class="btn btn-danger btn-sm text-white  float-end ">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    @if ($errors->all())
                        @foreach ($errors->all() as $error)
                            <div class="text-danger mb-2">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                            <div class="mb-3 col-6">
                                <label for="">Price</label>
                                <input type="number" name="price" class="form-control" />
                            </div>

                            <div class="mb-3 col-6">
                                <label for="" class="fw-bold mb-2">Category</label>
                                <select name="category_id" id="category" class="form-control">
                                    <option value="null">Select Category Name</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- sub category --}}

                            <div class="mb-3 col-6">
                                <label for="" class="fw-bold mb-2">Sub Category</label>
                                <select name="sub_category_id" class="form-control" id="subcategory">
                                    <option value="">Select a subcategory</option>
                                </select>
                            </div>

                             {{-- sub sub category --}}
                            <div class="mb-3 col-6">
                                <label for="" class="fw-bold mb-2">Sub Sub Category</label>
                                <select name="sub_sub_category_id" class="form-control" id="subsubcategory">
                                    <option value="">Select a subcategory</option>
                                </select>
                            </div>

                            <div class="mb-3 col-6">
                                <label for="">description</label>
                                <textarea name="description" class="form-control" rows="1"></textarea>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="">Image</label>
                                <input type="file" name="Image" class="form-control" />
                            </div>
                            <div class="mb-3 col-6">
                                <label for="">Status</label><br>
                                <input type="checkbox" name="status" />
                            </div>
                            <div class="mb-3 col-12">
                                <button type="submit" class="btn btn-primary float-end">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
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
                                $('#subcategory').append('<option value="' + key +
                                    '">' + value + '</option>');
                            });
                        }
                    });
                }
            });

            //sub sub category
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
                                $('#subsubcategory').append('<option value="' + key +
                                    '">' + value + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
