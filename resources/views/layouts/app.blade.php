<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('datatable/datatables.css')}}">
    <script src="{{asset('datatable/jquery-3.6.0.js')}}"></script>
    <script src="{{asset('datatable/datatables.js')}}"></script>
    <!-- Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{asset('vendorr/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('csss/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @if(auth()->user()->role=='admin')

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="far fa-grin-tongue-squint"></i>
                </div>
                <div class="sidebar-brand-text mx-1">New Era </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link  " href="/rooms">
                    <i class="fas fa-bed"></i>
                    <span>Rooms</span>
                </a>

            </li>
            <li class="nav-item active">
                <a class="nav-link " href="/roomdetails">
                    <i class="fas fa-boxes"></i>
                    <span>Room Details</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link  " href="/gallery">
                    <i class="fas fa-images"></i>
                    <span>Gallery</span>
                </a>

            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link " href="/user">
                    <i class="fas fa-user-alt"></i>
                    <span>Users</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link " href="/booking">
                    <i class="fas fa-clipboard"></i>
                    <span>Bookings</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/slider">
                    <i class="	fas fa-clone"></i>
                    <span>Sliders</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/feedback">
                    <i class="	fas fa-clone"></i>
                    <span>Feedbacks</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="/logout">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Sidebar Toggler (Side ma jane) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

        </ul>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active toggle" href="/">
                                <span class="  d-lg-inline text-slate-800 small">View Site</span></a>
                        </li>
                        <!-- divider -->
                        <div class="border border-black h-6 mt-4"></div>
                        <li class="nav-item ">
                            <a class="nav-link active toggle ">
                                <span class="mr-1 d-none d-lg-inline text-slate-800 small">
                                    Welcome,{{auth()->user()->name}}
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div>
                        @yield('content')

                    </div>
                </div>

            </div>
        </div>
        @endif
    </div>


    </div>
    <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="vendorr/jquery/jquery.min.js"></script>
    <script src="vendorr/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendorr/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->


</body>



</html>