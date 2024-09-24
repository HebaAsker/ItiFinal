@extends('pages.dashboard.layouts.app')

@section('title', 'Books List')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
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
                                        <a href="{{ route('student.book.info', $book->id) }}" class="btn btn-info btn-sm">View</a>
                                        @if($book->status !== 'borrowed')
                                            <a href="{{ route('book.borrow', ['id' => $book->id]) }}" class="btn btn-success btn-sm">Borrow</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-6">
                    {{ $books->links() }} <!-- Pagination links -->
                </div>
            </div>
        </div>
    </div>
@endsection
