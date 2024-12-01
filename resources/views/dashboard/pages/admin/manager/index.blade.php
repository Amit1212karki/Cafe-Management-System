@extends('dashboard.layout.adminmain')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Recent Customers</h4>
                <p class="card-subtitle mb-4 font-size-13">Transaction period from 21 July to 25 Aug
                </p>
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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row mt-3 mb-3">
                    <div class="col-md-12 d-flex justify-content-end">
                        <!-- Add Members Button wrapped with <a> and aligned to the right -->
                        <a href="{{ route('admin-manager-add') }}" class="btn btn-primary">
                            Add Manager
                        </a>
                    </div>
                </div>

                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Form No </th>
                            <th>Card No </th>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Create Date</th>
                            <th>Branch</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                       

                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
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