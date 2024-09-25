@extends('pages.dashboard.layouts.app')

@section('title', 'Students List')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <!-- Search Bar -->
            <form method="GET" action="{{ route('students.search') }}" class="mb-4">
                <div class="input-group" style="border: 2px solid #007bff; border-radius: 0.5rem; box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); padding: 0.5rem;">
                    <input type="text" name="search" class="form-control form-control-lg" placeholder="Search by student ID" value="{{ request('search') }}" aria-label="Search by student ID" style="border: none;">
                    <button class="btn btn-primary btn-lg" type="submit" style="border-radius: 0;">Search</button>
                </div>
            </form>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Students</h5>
                </div>
                <div class="card-body">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Borrowed Books</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>
                                    @if($student->books->isNotEmpty())
                                    <ul>
                                        @foreach($student->books as $book)
                                        <li>{{ $book->name }}</li>
                                        @endforeach
                                    </ul>
                                    @else
                                    No borrowed books
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
