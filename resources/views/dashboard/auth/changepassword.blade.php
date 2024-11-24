@extends('dashboard.layout.adminmain')
@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-12 col-lg-12 d-flex align-items-center">
            <div class="card shadow-lg rounded w-100 overflow-hidden">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center w-75 mx-auto auth-logo mb-4">
                                <a href="index.html" class="logo-dark">
                                    <span><img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="32"></span>
                                </a>
                                <a href="index.html" class="logo-light">
                                    <span><img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="32"></span>
                                </a>
                            </div>

                            <h1 class="h5 mb-1 text-center">Change User password!!</h1>
                            <p class="text-muted mb-4 text-center">Provide current password and retyp new password to complete.</p>

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
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="/admin/update-password/{{ $user->id }}" method="POST">
                                @csrf

                                <div class="row g-3">
                                    

                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="password">Current Password</label>
                                        <input class="form-control" name="password" type="password" required id="password" placeholder="Enter  current password">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="new_password">New Password</label>
                                        <input class="form-control" name="new_password" type="password" required id="password" placeholder="Enter  new password">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="password">Confirm New Password</label>
                                        <input class="form-control" name="new_password_confirmation" type="password" required id="new_password_confirmation" placeholder="Confirm  new password">
                                    </div>

                                </div>

                                <div class="form-group mb-0 text-center mt-3 col-12 col-md-2">
                                    <button class="btn btn-primary w-100" style="transition: 0.3s; background-color: #0056b3;"
                                        onmouseover="this.style.backgroundColor='#004494'"
                                        onmouseout="this.style.backgroundColor='#0056b3'">
                                        Chnage Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
</script>
@endsection