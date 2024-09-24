@extends('pages.dashboard.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card z-index-2 bg-light">
                <div class="card-header bg-gradient-primary">
                    <h5 class="text-white mb-0">User Information</h5>
                </div>
                <div class="card-body">
                    <h6 class="mb-0">Name: {{ auth()->user()->name }}</h6>
                    <p class="text-sm">Email: {{ auth()->user()->email }}</p>
                    <hr class="dark horizontal">
                    <p class="mb-0 text-sm">User ID: {{ auth()->user()->id }}</p>
                    <p class="mb-0 text-sm">User Role: {{ auth()->user()->role }}</p>
                    <p class="mb-0 text-sm">Joined on: {{ auth()->user()->created_at->format('Y-m-d') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
