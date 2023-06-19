@extends('layouts.admin.master')
@section('page_content')
<div class="row">
    <div class="col-md-12">
        @if (session('massage'))
            <div class="alert alert-success">{{ session('massage') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>category
                    <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm  float-end ">Add
                        category</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-borderd table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description}}</td>
                                <td>{{ $category->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ route('category.edit' , $category->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('category.delete' , $category->id) }}"
                                        class="btn btn-sm btn-danger">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
