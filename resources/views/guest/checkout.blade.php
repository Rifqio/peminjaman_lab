@extends('guest.layouts.layout')
@section('container')

    <div class="mt-20 w-full flex items-center justify-center">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
    </div>


@endsection
