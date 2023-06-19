@extends('layouts.admin.master')
@section('page_content')
<div class="row">
    <div class="col-md-12">
        @if (session('massage'))
            <div class="alert alert-success">{{ session('massage') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Proudct List
                    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm  float-end ">Add
                        Proudct</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-borderd table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>category</th>
                            <th>Sub category name</th>
                            <th>sub sub category name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $products)
                            <tr>
                                <td>{{ $products->id }}</td>
                                <td>{{ $products->name }}</td>
                                <td><img src="{{ asset($products->Image) }}" alt="" width="50px" height="50px"></td>
                                <td>{{ $products->category->name ??''}}</td>
                                <td>{{ $products->subCategory->name ??''}}</td>
                                <td>{{ $products->subSubCategory->name ??''}}</td>

                                <td>{{ $products->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ route('product.edit' , $products->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('product.delete' , $products->id) }}"
                                        class="btn btn-sm btn-danger">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                </div>
            </div>
            {{ $product->links() }}
        </div>
    </div>

</div>
@endsection
