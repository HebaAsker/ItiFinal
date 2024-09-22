@extends('pages.dashboard.layouts.app')

@section('title', 'Add New Book')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Add New Book</h2>

            <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Book Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Book Name</label>
                            <input type="text" name="name" id="name" class="form-control" required style="border: 2px solid #007bff; border-radius: 0.25rem;">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="author">Author Name</label>
                            <input type="text" name="author" id="author" class="form-control" required style="border: 2px solid #007bff; border-radius: 0.25rem;">
                            @error('author')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="img">Book Cover Image</label>
                            <input type="file" name="img" id="img" class="form-control" accept="image/*" required style="border: 2px solid #007bff; border-radius: 0.25rem;">
                            @error('img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
