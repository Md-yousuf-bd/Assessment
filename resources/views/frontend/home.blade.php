
@extends('layouts.frontend.master')
@section('content')
<div class="text-center">
    <h1>{{ __('text.title') }} {{ Auth::user()->name ??'' }}</h1>
    <p>{{ __('text.titleMassage') }}</p>
</div>
@endsection





