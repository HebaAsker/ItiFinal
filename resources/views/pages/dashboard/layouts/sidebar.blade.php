<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <a class="navbar-brand m-0" href="https://demos.creative-tim.com/material-dashboard/pages/dashboard" target="_blank">
            <img src="{{ asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Admin Dashboard</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        @if(Auth::user()->role=='admin')
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active bg-gradient-primary' : '' }}" href="{{ route('dashboard') }}">
                        <i class="material-icons opacity-10">dashboard</i>
                        <span class="nav-link-text ms-2">Dashboard</span>
                    </a>
                    <a class="nav-link text-white {{ request()->routeIs('books') ? 'active bg-gradient-primary' : '' }}" href="{{ route('books') }}">
                        <i class="material-icons opacity-10">library_books</i>
                        <span class="nav-link-text ms-2">Books</span>
                    </a>
                    <a class="nav-link text-white {{ request()->routeIs('borrowed.books') ? 'active bg-gradient-primary' : '' }}" href="{{ route('borrowed.books') }}">
                        <i class="material-icons opacity-10">book</i>
                        <span class="nav-link-text ms-2">Borrowed Books</span>
                    </a>
                    <a class="nav-link text-white {{ request()->routeIs('students') ? 'active bg-gradient-primary' : '' }}" href="{{ route('students') }}">
                        <i class="material-icons opacity-10">group</i>
                        <span class="nav-link-text ms-2">Students</span>
                    </a>
                    <a class="nav-link text-white {{ request()->routeIs('edit.info') ? 'active bg-gradient-primary' : '' }}" href="{{ route('edit.info') }}">
                        <i class="material-icons opacity-10">account_circle</i>
                        <span class="nav-link-text ms-2">Update Profile</span>
                    </a>
                </li>
            </ul>
        @else
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active bg-gradient-primary' : '' }}" href="{{ route('dashboard') }}">
                        <i class="material-icons opacity-10">dashboard</i>
                        <span class="nav-link-text ms-2">Dashboard</span>
                    </a>
                    <a class="nav-link text-white {{ request()->routeIs('student.books') ? 'active bg-gradient-primary' : '' }}" href="{{ route('student.books') }}">
                        <i class="material-icons opacity-10">library_books</i>
                        <span class="nav-link-text ms-2">Books</span>
                    </a>
                    <a class="nav-link text-white {{ request()->routeIs('student.borrowed.books') ? 'active bg-gradient-primary' : '' }}" href="{{ route('student.borrowed.books') }}">
                        <i class="material-icons opacity-10">book</i>
                        <span class="nav-link-text ms-2">Borrowed Books</span>
                    </a>
                    <a class="nav-link text-white {{ request()->routeIs('edit.info') ? 'active bg-gradient-primary' : '' }}" href="{{ route('edit.info') }}">
                        <i class="material-icons opacity-10">account_circle</i>
                        <span class="nav-link-text ms-2">Update Profile</span>
                    </a>
                </li>
            </ul>
        @endif
    </div>
</aside>
