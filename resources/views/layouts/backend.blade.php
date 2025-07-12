<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Admin Dashboard</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Admin Dashboard">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 

    <!-- FontAwesome -->
    <script defer src="{{ asset('assets/backend/plugins/fontawesome/js/all.min.js') }}"></script>
    
    <!-- App CSS -->  
    <link rel="stylesheet" href="{{ asset('assets/backend/css/portal.css') }}">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">

    @yield('styles')
</head> 
<body class="app">   	
    <!-- Navbar -->
    @include('layouts.component-backend.navbar')

    <div class="app-wrapper d-flex">
        <!-- Sidebar -->
        @include('layouts.component-backend.sidebar')

        <!-- Content -->
        <div class="app-content p-4">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="{{ asset('assets/backend/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/index-charts.js') }}"></script>
    <script src="{{ asset('assets/backend/js/app.js') }}"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>

    @stack('scripts')
</body>
</html>
