@extends('pages.dashboard.layouts.app')

@section('title', 'Update Admin Information')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Update Admin Information</h2>

            <!-- Form to update admin information -->
            <form method="POST" action="{{ route('update.admin.info') }}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Admin Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required style="border: 2px solid #007bff; border-radius: 0.25rem;">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required style="border: 2px solid #007bff; border-radius: 0.25rem;">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" style="border: 2px solid #007bff; border-radius: 0.25rem;">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" style="border: 2px solid #007bff; border-radius: 0.25rem;">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Update Information</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
