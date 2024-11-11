@extends('dashboard.layout.main')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Application for of previlage card </h4>
            </div>
            <div class="col-lg-6">
                <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0 float-end">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">president</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"></h4>
                    <p class="sub-header">

                    </p>

                    <form action="{{ route('members-store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label for="inputZip" class="form-label">Form No</label>
                                <input type="text" name="form_no" class="form-control" id="formno">
                            </div>

                            <div class="mb-2 col-md-4">
                                <label for="inputZip" class="form-label">Card No</label>
                                <input type="text" name="card_no" class="form-control" id="cardno">
                            </div>

                            <div class="mb-2 col-md-4">
                                <label for="inputZip" class="form-label">Date (AD)</label>
                                <input class="form-control" type="date" name="date" id="example-date">
                            </div>

                            <div class="mb-2 col-md-4">
                                <label for="inputZip" class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" id="fullname">
                            </div>

                            <div class="mb-2 col-md-4">
                                <label for="inputState" class="form-label">Gender</label>
                                <select name="gender" id="inputState" class="form-select">
                                    <option value="">Choose</option> 
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4"
                                    name="email" placeholder="Email">
                            </div>

                            <div class="mb-2 col-md-4">
                                <label for="inputAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="inputAddress"
                                    name="address" placeholder="1234 Main St">
                            </div>

                            <div class="mb-2 col-md-4">
                                <label for="inputAddress" class="form-label">Date of Birth (AD)</label>
                                <input class="form-control" type="date" name="dob" id="example-date">
                            </div>

                            <div class="mb-2 col-md-4">
                                <label for="inputZip" class="form-label">Mobile NO </label>
                                <input type="text" name="phone" class="form-control" id="mobileno">
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="mb-2 col-md-12">

                                <button type="submit" class="btn btn-primary text-center">Save</button>
                                <button type="submit" class="btn btn-primary">Cancle </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->

        <!-- end col -->
    </div>
    <!-- end row -->

    <!-- end row -->


</div> <!-- content -->

@endsection