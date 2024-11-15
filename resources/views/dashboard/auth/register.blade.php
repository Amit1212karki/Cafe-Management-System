<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="light" data-topbar-color="dark">

<head>
    <meta charset="utf-8" />
    <title>president | previlage card Login !! </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="assets/js/config.js"></script>
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


                                        <h1 class="h5 mb-1">Register User!!</h1>

                                        <p class="text-muted mb-4">Enter your email, password and branch to register.</p>

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
                                        <form action="{{ route('register-user') }}" method="POST">
                                            @csrf

                                            <div class="form-group mb-3">
                                                <label class="form-label" for="name">Name</label>
                                                <input class="form-control" name="name" type="text" id="name" required placeholder="Enter your name">
                                            </div>
                                            
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

                                            <div class="form-group mb-3">
                                                <a href="pages-recoverpw.html"
                                                    class="text-muted float-end"><small></small></a>
                                                <label class="form-label" for="branch">Branch</label>
                                                <input class="form-control" name="branch" type="branch" required="" id="branch"
                                                    placeholder="Enter your branch">
                                            </div>



                                            <div class="form-group mb-3">
                                                <div class="">
                                                    <input class="form-check-input" type="checkbox" id="checkbox-signin"
                                                        checked>
                                                    <label class="form-check-label ms-2" for="checkbox-signin">Remember
                                                        me</label>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary w-100" type="submit"> Register</button>
                                            </div>
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
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>

</body>

</html>