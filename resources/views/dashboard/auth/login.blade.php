<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="light" data-topbar-color="dark">

<head>
    <meta charset="utf-8" />
    <title>president | previlage card Login !! </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block card shadow-lg rounded my-5 overflow-hidden">
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center w-75 mx-auto auth-logo mb-4">
                                            <a href="index.html" class="logo-dark">
                                                <span><img src="assets/images/logo-dark.png" alt="" height="32"></span>
                                            </a>

                                            <a href="index.html" class="logo-light">
                                                <span><img src="assets/images/logo-light.png" alt="" height="32"></span>
                                            </a>
                                        </div>


                                        <h1 class="h5 mb-1">Welcome Back!</h1>

                                        <p class="text-muted mb-4">Enter your email address and password to access admin
                                            panel.</p>

                                        @if ($message = Session::get('success'))
                                        <div class="alert alert-success" id="alert" style="background-color: #d7f3e3;">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif

                                        @if ($message = Session::get('error'))
                                        <div class="alert alert-danger" id="alert">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>{{ $error }}</strong>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <form action="{{ route('login-submit') }}" method="POST">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="emailaddress">Email address</label>
                                                <input class="form-control" name="email" type="email" id="emailaddress" required=""
                                                    placeholder="Enter your email">
                                            </div>

                                            <div class="form-group mb-3">
                                                <a href="pages-recoverpw.html"
                                                    class="text-muted float-end"><small></small></a>
                                                <label class="form-label" for="password">Password</label>
                                                <input class="form-control" name="password" type="password" required="" id="password"
                                                    placeholder="Enter your password">
                                            </div>

                                            <!-- <div class="form-group mb-3">
                                                <a href="pages-recoverpw.html"
                                                    class="text-muted float-end"><small></small></a>
                                                <label class="form-label" for="password">Choose Branch</label>
                                                <select class="form-control" data-toggle="select2">
                                                    <option>Select</option>
                                                    <option value="Sundhara">Sundhara</option>
                                                    <option value="Kalani">Kalani</option>
                                                    <option value="Balaju">Balaju</option>
                                                    <option value="maharajung">maharajung</option>
                                                    <option value="Battishputali">Battishputali</option>
                                                    <option value="Narayanghat">Narayanghat</option>
                                                    <option value="Lumbeni">Lumbeni</option>
                                                </select>

                                            </div> -->



                                            <div class="form-group mb-3">
                                                <div class="">
                                                    <input class="form-check-input" type="checkbox" id="checkbox-signin"
                                                        checked>
                                                    <label class="form-check-label ms-2" for="checkbox-signin">Remember
                                                        me</label>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary w-100" type="submit">
                                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                                Log In
                                            </button>
                                        </form>



                                        <!-- end row -->
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- App js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all alert messages
            const alertMessages = document.querySelectorAll('.alert');

            // Iterate over each alert
            alertMessages.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = "opacity 0.5s ease"; // Smooth fade-out
                    alert.style.opacity = "0"; // Start fade-out animation
                    setTimeout(() => alert.remove(), 500); // Remove after fade-out
                }, 5000); // 5 seconds delay
            });
        });
        document.querySelector('form').addEventListener('submit', function() {
            const button = this.querySelector('button[type="submit"]');
            const spinner = button.querySelector('.spinner-border');
            spinner.classList.remove('d-none');
        });
    </script>
</body>

</html>