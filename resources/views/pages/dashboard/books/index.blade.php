@extends('pages.dashboard.layouts.app')

@section('title', 'Books List')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Books List</h2>

                <!-- Add New Book Button -->
                <div class="mb-3">
                    <a href="{{ route('book.create') }}" class="btn btn-primary">Add New Book</a>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Books</h5>
                    </div>
                    <div class="card-body">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Book Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Book Image</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>
                                            <img src="{{ asset('images/books/' . $book->img) }}" alt="{{ $book->name }} cover" style="width: 50px; height: auto;">
                                        </td>
                                        <td>
                                            <span class="badge" style="color: {{ $book->status == 'borrowed' ? 'red' : 'black' }};">
                                                {{ ucfirst($book->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('book.info', $book->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('book.destroy', $book->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-4">
                    {{ $books->links() }} <!-- Pagination links -->
                </div>
            </div>
        </div>
    </div>
@endsection
