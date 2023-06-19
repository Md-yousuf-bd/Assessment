@extends('layouts.frontend.master')
@section('content')
    <style>
        .textColor {
            color: orangered
        }

        .bgColor {
            background-color: orangered;
        }
    </style>
    <div class="row justify-content-center my-5 ">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="textColor">{{ __('text.registration') }}</h3>
                </div>
                <div class="card-body ">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label textColor">{{ __('text.name') }}</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="Enter your name" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label textColor">{{ __('text.emailAddress') }}</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="Enter your email" >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label textColor">{{ __('text.password') }}</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary bgColor">{{ __('text.reg') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
