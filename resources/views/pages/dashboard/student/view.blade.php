@extends('pages.dashboard.layouts.app')

@section('title', 'Book Information')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Book Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Book Image</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Return Due</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($books)
                                    <tr>
                                        <td>{{ $books->name }}</td>
                                        <td>{{ $books->author }}</td>
                                        <td>
                                            <img src="{{ asset('images/books/' . $books->img) }}" alt="{{ $books->name }} cover" style="width: 50px; height: auto;">
                                        </td>
                                        <td>
                                            <span class="badge" style="color: {{ $books->status == 'borrowed' ? 'red' : 'black' }};">
                                                {{ ucfirst($books->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($books->status == 'borrowed')
                                                {{ $books->updated_at->addDays(14)->format('Y-m-d') }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">You didn't borrow books yet.</td>
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
