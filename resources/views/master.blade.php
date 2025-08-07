<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- ✅ Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css')  }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body.dark-mode {
            background-color: #121212 !important;
            color: white !important;
        }

        body.dark-mode .app-header,
        body.dark-mode .left-sidebar,
        body.dark-mode .page-wrapper,
        body.dark-mode .body-wrapper,
        body.dark-mode .sidebar-nav,
        body.dark-mode .card,
        body.dark-mode .dropdown-menu {
            background-color: #1e1e1e !important;
            color: #e0e0e0 !important;
        }

        body.dark-mode .sidebar-item a,
        body.dark-mode .hide-menu,
        body.dark-mode .navbar-nav .nav-link,
        body.dark-mode .dropdown-item,
        body.dark-mode .btn {
            color: #e0e0e0 !important;
        }

        body.dark-mode .btn-toggle {
            background-color: #333 !important;
            color: #fff !important;
            border: none;
        }

        body.dark-mode .sidebar-divider {
            border-top: 1px solid #444;
        }

        body.dark-mode .dropdown-menu {
            border: 1px solid #333;
        }
    </style>

</head>
<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="#" class="text-nowrap logo-img">
                    <h3>LOGO</h3>
                </a>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-6"></i>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{route('dashboard')}}" aria-expanded="false">
                            <i class="ti ti-atom"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <span class="sidebar-divider lg"></span>
                    </li>
                    <li class="nav-small-cap">
                        <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                        <span class="hide-menu">Management</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between" href="{{route('student.show')}}" aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-user"></i>
                  </span>
                                <span class="hide-menu">Student</span>
                            </div>

                        </a>

                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between" href="{{route('agency.show')}}" aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-chart-donut-3"></i>
                  </span>
                                <span class="hide-menu">Board / Center</span>
                            </div>

                        </a>

                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between"
                           href="{{route('invoice.show')}}"
                           aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-receipt"></i>
                  </span>
                                <span class="hide-menu">Invoices</span>
                            </div>

                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between"
                           href="{{route('trans.show')}}"
                           aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-credit-card"></i>
                  </span>
                                <span class="hide-menu">Transactions</span>
                            </div>

                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between"
                           href="{{route('admin.show')}}"
                           aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-lock"></i>
                  </span>
                                <span class="hide-menu">Administration</span>
                            </div>

                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between"
                           href="{{route('settings')}}"
                           aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-settings"></i>
                  </span>
                                <span class="hide-menu">Settings</span>
                            </div>

                        </a>
                    </li>

                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">

                <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                        <li class="nav-item dropdown">
                            <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <img src="{{ asset('/assets/images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                <div class="message-body">

                                    <a href="#" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--  Header End -->
        <div class="body-wrapper-inner">
            <div class="container-fluid">

                @yield('content')

            </div>
        </div>
    </div>
</div>

<!-- ✅ jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- ✅ Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/assets/js/sidebarmenu.js')}}"></script>
<script src="{{asset('/assets/js/app.min.js')}}"></script>
<script src="{{asset('/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{asset('/assets/libs/simplebar/dist/simplebar.js')}}"></script>
<script src="{{asset('/assets/js/dashboard.js')}}"></script>
<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

@livewireScripts
@stack('scripts')
</body>

</html>
