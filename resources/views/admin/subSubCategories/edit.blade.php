@extends('layouts.admin.master')
@section('page_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Sub Sub category
                        <a href="{{ route('subsub.index') }}" class="btn btn-danger btn-sm text-white  float-end ">Back
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    @if ($errors->all())
                        @foreach ($errors->all() as $error)
                            <div class="text-danger mb-2">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form action="{{ route('subsub.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ $record->name }}" class="form-control" />
                            </div>
                            <div class="mb-3 col-6">
                                <label for="">description</label>
                                <input type="text" name="description" value="{{ $record->description }}"
                                    class="form-control" />
                            </div>
                            <div class="mb-3 col-6">
                                <label for="" class="fw-bold mb-2">Category</label>
                                <select name="sub_category_id" class="form-control">
                                    <option value="null">Select Category Name</option>
                                    @foreach ($subCategories as $sub)
                                        <option value="{{ $sub->id }}"
                                            {{ $sub->id == $record->sub_category_id ? 'selected' : '' }}>
                                            {{ $sub->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="">Status</label><br>
                                <input type="checkbox" name="status" {{ $record->status == '1' ? 'checked' : '' }} />
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
@endsection
