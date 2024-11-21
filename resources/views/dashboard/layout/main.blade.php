<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="light" data-topbar-color="dark">

<head>
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- TailwindCSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.7/dist/tailwind.min.css" rel="stylesheet">

    <!-- Morris CSS -->
    <link href="{{ asset('assets/libs/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />

    <!-- App CSS -->
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Meta for responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Third-Party CSS -->
    <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        <!-- ========== Left Sidebar ========== -->
        <div class="main-menu">
            <!-- Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="index.html" class="logo-light">
                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo" class="logo-lg" height="32">
                    <img src="{{ asset('assets/images/logo-light-sm.png') }}" alt="small logo" class="logo-sm" height="32">
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo-dark">
                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo" class="logo-lg" height="32">
                    <img src="{{ asset('assets/images/logo-dark-sm.png') }}" alt="small logo" class="logo-sm" height="32">
                </a>
            </div>

            <!--- Menu -->
            <div data-simplebar>
                <ul class="app-menu">

                    <li class="menu-title">Menu</li>

                    <li class="menu-item">
                        <a href="/staff/dashboard" class="menu-link waves-effect">
                            <span class="menu-icon"><i data-lucide="airplay "></i></span>
                            <span class="menu-text"> Dashboards </span>

                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('members-index') }}" class="menu-link waves-effect">
                            <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar"
                                    class="lucide lucide-calendar">
                                    <path d="M8 2v4"></path>
                                    <path d="M16 2v4"></path>
                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                    <path d="M3 10h18"></path>
                                </svg></span>
                            <span class="menu-text">Member </span>

                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="/add-staff-point" class="menu-link waves-effect">
                            <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar"
                                    class="lucide lucide-calendar">
                                    <path d="M8 2v4"></path>
                                    <path d="M16 2v4"></path>
                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                    <path d="M3 10h18"></path>
                                </svg></span>
                            <span class="menu-text">Points </span>

                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="search-card.html" class="menu-link waves-effect">
                            <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar"
                                    class="lucide lucide-calendar">
                                    <path d="M8 2v4"></path>
                                    <path d="M16 2v4"></path>
                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                    <path d="M3 10h18"></path>
                                </svg></span>
                            <span class="menu-text">Password</span>

                        </a>
                    </li>
                    
                   


                    <li class="menu-item">
                        <a href="search-card.html" class="menu-link waves-effect">
                            <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar"
                                    class="lucide lucide-calendar">
                                    <path d="M8 2v4"></path>
                                    <path d="M16 2v4"></path>
                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                    <path d="M3 10h18"></path>
                                </svg></span>
                            <span class="menu-text"> View Member </span>

                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#menuTables" data-bs-toggle="collapse" class="menu-link waves-effect">
                            <span class="menu-icon"><i data-lucide="list"></i></span>
                            <span class="menu-text"> Reports </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuTables">
                            <ul class="sub-menu">

                                <li class="menu-item">
                                    <a href="view-report.html" class="menu-link">
                                        <span class="menu-text">View Reports</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="menu-item">
                        <a href="/logout" class="menu-link waves-effect">
                            <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar"
                                    class="lucide lucide-calendar">
                                    <path d="M8 2v4"></path>
                                    <path d="M16 2v4"></path>
                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                    <path d="M3 10h18"></path>
                                </svg></span>
                            <span class="menu-text">Logout</span>

                        </a>
                    </li>

                </ul>


            </div>
        </div>



        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar">
                    <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

                        <!-- Brand Logo -->
                        <div class="logo-box">
                            <!-- Brand Logo Light -->
                            <a href="index.html" class="logo-light">
                                <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo" class="logo-lg" height="32">
                                <img src="{{ asset('assets/images/logo-light-sm.png') }}" alt="small logo" class="logo-sm" height="32">
                            </a>

                            <!-- Brand Logo Dark -->
                            <a href="index.html" class="logo-dark">
                                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo" class="logo-lg" height="32">
                                <img src="{{ asset('assets/images/logo-dark-sm.png') }}" alt="small logo" class="logo-sm" height="32">
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu waves-effect waves-light rounded-circle">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-2">

                        <li class="d-none d-md-inline-block">
                            <a class="nav-link waves-effect waves-light" href="#" data-bs-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen font-size-24"></i>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none"
                                data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <i class="mdi mdi-magnify font-size-24"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-end dropdown-lg p-0">
                                <form class="input-group p-3">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary rounded-start-0" type="submit"><i
                                                class="mdi mdi-magnify"></i></button>
                                    </div>
                                </form>
                            </div>
                        </li>




                        <li class="nav-link waves-effect waves-light" id="theme-mode">
                            <i class="bx bx-moon font-size-24"></i>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                                data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="user-image" class="rounded-circle">
                                <span class="ms-1 d-none d-md-inline-block">
                                    {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-lucide="user" class="font-size-16 me-2"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-lucide="settings" class="font-size-16 me-2"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="#" class="dropdown-item notify-item">
                                    <i data-lucide="lock" class="font-size-16 me-2"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="/logout" class="dropdown-item notify-item">
                                    <i data-lucide="log-out" class="font-size-16 me-2"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->
            <div class="px-3">

                <!-- Start Content-->
                @yield('content')



                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> © president
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end">
                                    <p class="mb-0">Design & Develop by <a href="https://namunacomputer.com/"
                                            target="_blank">Namuna Computer</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>

        <!-- END wrapper -->
        <script src="{{ asset('assets/js/config.js') }}"></script>
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="{{ asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
        <script src="{{ asset('assets/libs/morris.js/morris.min.js') }}"></script>
        <script src="{{ asset('assets/libs/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>




        <!-- Third Party JS -->
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>

        <!-- Datatables JS Page-Specific Script -->
        <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
</body>

</html>