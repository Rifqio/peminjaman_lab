@extends('guest.layouts.layout')
@section('container')
<div class="container min-h-screen">
    <div class="col-6 m-auto">
        <div class="row mt-3">
            <form action="/profile" method="post">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Hp</label>
                    <input type="text" name="phone" class="form-control"
                        value="{{ Auth::user()->guest->phone }}">
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

