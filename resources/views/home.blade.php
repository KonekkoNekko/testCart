@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        <p>{{ __('You are logged in!') }}</p>
                        <p><strong>{{ __('Name:') }}</strong> {{ auth()->user()->name }}</p>
                        <p><strong>{{ __('Email:') }}</strong> {{ auth()->user()->email }}</p>
                        <p><strong>{{ __('Username:') }}</strong> {{ auth()->user()->username }}</p>
                        <a href="{{ route('product') }}" class="btn btn-primary">Produk</a>
                    @else
                        <p>{{ __('You are not logged in.') }}</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
