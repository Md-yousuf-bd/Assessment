@extends('layouts.frontend.master')
@section('content')
    <style>
        .minHeight {
            min-height: 420px;
        }

        .textColor {
            color: orangered
        }

        .bgColor {
            background-color: orangered;
        }
    </style>
    <div class="row justify-content-center my-5 minHeight">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class=" textColor" >{{ __('text.login') }}</h3>
                </div>
                <div class="card-body">
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label @error('email') is-invalid @enderror textColor">{{ __('text.emailAddress') }}</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter your email" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="">
                            <label for="password" class="form-label textColor">{{ __('text.password') }}</label>
                            <input type="password" name="password" class="form-control @error('Password') is-invalid @enderror" id="password" >
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <a class="p-2" href="{{ route('register') }}">{{ __('text.newAccount') }}</a>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary bgColor">{{ __('text.login') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
