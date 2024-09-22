@extends('pages.dashboard.layouts.app')

@section('title', 'Update Book')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Update Book</h2>

            <form method="POST" action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Book Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Book Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $book->name) }}" required style="border: 2px solid #007bff; border-radius: 0.25rem;">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="author">Author Name</label>
                            <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $book->author) }}" required style="border: 2px solid #007bff; border-radius: 0.25rem;">
                            @error('author')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="img">Book Cover Image</label>
                            <input type="file" name="img" id="img" class="form-control" accept="image/*" style="border: 2px solid #007bff; border-radius: 0.25rem;">
                            @error('img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($book->img)
                            <div class="form-group">
                                <label>Current Image:</label><br>
                                <img src="{{ asset('images/books/' . $book->img) }}" alt="{{ $book->name }} cover" style="width: 100px; height: auto;">
                            </div>
                        @endif
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
