<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - MEDICAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }
        .sidebar .logo-container {
            background-color: #2a4365;
            color: white;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom-right-radius: 1.5rem;
        }
        .sidebar .nav-links a {
            color: #495057;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            transition: background-color 0.2s;
        }
        .sidebar .nav-links a:hover,
        .sidebar .nav-links a.active {
            background-color: #e9ecef;
        }
        .main-header {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 1rem;
        }
        .table-striped > tbody > tr:nth-of-type(odd) > * {
            background-color: rgba(0,0,0,.05);
        }
        .modal-content {
            border-radius: 0.5rem;
        }
        .profile-container {
            cursor: pointer;
            position: relative;
        }
        .profile-dropdown {
            display: none;
            position: absolute;
            bottom: 100%;
            left: 0;
            margin-bottom: 0.5rem;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border-radius: 0.5rem;
            z-index: 100;
        }
    </style>
</head>
<body>

    <div class="d-flex" style="height: 100vh;">


        @include('partials.sidebar')


        <div class="flex-grow-1 d-flex flex-column overflow-hidden">
            <main class="flex-grow-1 overflow-auto p-4">
                @yield('content')
            </main>
            
            <!--FOOTER-->
            @include('partials.footer')
        </div>
    </div>

    <!-- Modals -->
    @include('partials.modals')


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
    @yield('scripts')

</body>
</html>
