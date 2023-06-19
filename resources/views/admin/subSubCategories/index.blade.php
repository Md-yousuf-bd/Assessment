@extends('layouts.admin.master')
@section('page_content')
<div class="row">
    <div class="col-md-12">
        @if (session('massage'))
            <div class="alert alert-success">{{ session('massage') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Sub Sub Category List
                    <a href="{{ route('subsub.create') }}" class="btn btn-primary btn-sm  float-end ">Add
                       Sub Sub category</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-borderd table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Sub category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subSubCategory as $subSub)
                            <tr>
                                <td>{{ $subSub->id }}</td>
                                <td>{{ $subSub->name }}</td>
                                <td>{{ $subSub->SubCategory->name ??''}}</td>
                                <td>{{ $subSub->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ route('subsub.edit' , $subSub->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('subsub.delete' , $subSub->id) }}"
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
        {{ $subSubCategory->links() }}
    </div>
</div>
@endsection
