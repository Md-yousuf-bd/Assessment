@extends('layouts.admin.master')
@section('page_content')
<div class="row">
    <div class="col-md-12">
        @if (session('massage'))
            <div class="alert alert-success">{{ session('massage') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Sub Category List
                    <a href="{{ route('sub.create') }}" class="btn btn-primary btn-sm  float-end ">Add
                       Sub category</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-borderd table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subCategory as $sub)
                            <tr>
                                <td>{{ $sub->id }}</td>
                                <td>{{ $sub->name }}</td>
                                <td>{{ $sub->category->name }}</td>
                                <td>{{ $sub->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ route('sub.edit' , $sub->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('sub.delete' , $sub->id) }}"
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
        {{ $subCategory->links() }}
</div>
@endsection
