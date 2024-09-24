<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
    <style>
        /* Custom styles */
        body {
            background-color: #f3f4f6; /* Light gray background */
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        .main-content {
            padding: 20px;
            border-radius: 10px;
            background: white; /* Card-like background */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin: 20px; /* Uniform margin */
            max-height: none; /* Remove fixed height */
            height: auto; /* Allow height to adjust based on content */
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e0e0e0;
        }

        .header h1 {
            font-size: 24px;
            font-weight: 500;
            color: #333; /* Darker text color */
        }

        .logout-button {
            background: #dc3545; /* Bootstrap danger color */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s, transform 0.2s;
        }

        .logout-button:hover {
            background: #c82333; /* Darker shade on hover */
            transform: scale(1.05); /* Slight scaling effect */
        }

        .content-area {
            margin-top: 20px; /* Space between header and content */
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
            padding: 10px 0;
            border-top: 1px solid #e0e0e0; /* Top border for separation */
        }

        .table {
            width: 100%; /* Full width for tables */
            margin-top: 20px; /* Space above the table */
        }

        .table th, .table td {
            padding: 12px; /* Padding for table cells */
            vertical-align: middle; /* Align content vertically */
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column; /* Stack header elements on small screens */
                align-items: flex-start;
            }

            .logout-button {
                width: 100%; /* Full-width button on small screens */
                margin-top: 10px; /* Space above button */
            }
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-200">
    @include('pages.dashboard.layouts.sidebar')
    <main class="main-content position-relative border-radius-lg">
        <div class="container-fluid py-4">
            <div class="header">
                <h1>@yield('title', 'Admin Dashboard')</h1>
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">Log out</button>
                </form>
            </div>

            <div class="content-area">
                @yield('content')
            </div>

            <div class="footer">
                &copy; {{ date('Y') }} Your Company. All Rights Reserved.
            </div>
        </div>
    </main>
</body>

</html>
