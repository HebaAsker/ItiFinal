@extends('pages.dashboard.layouts.app')

@section('title', 'Book Information')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Book Information</h2>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Book</h5>
                    </div>
                    <div class="card-body">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Book Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Book Image</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    @if($books && $books->status == 'borrowed')
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Borrowed By</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if($books)
                                    <tr>
                                        <td>{{ $books->name }}</td>
                                        <td>{{ $books->author }}</td>
                                        <td>
                                            <img src="{{ asset('images/books/' . $book->img) }}" alt="{{ $book->name }} cover" style="width: 50px; height: auto;">
                                        </td>
                                        <td>
                                            <span class="badge" style="color: {{ $books->status == 'borrowed' ? 'red' : 'black' }};">
                                                {{ ucfirst($books->status) }}
                                            </span>
                                        </td>

                                        @if($books->status == 'borrowed')
                                            <td>{{ $books->user ? $books->user->name : 'Not Assigned' }}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        <td>
                                            @if($book->status == 'borrowed')
                                            <a href="{{ route('book.status', ['id' => $book->id]) }}" class="btn btn-success btn-sm">Make It Avaliable</a>
                                        @endif
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
