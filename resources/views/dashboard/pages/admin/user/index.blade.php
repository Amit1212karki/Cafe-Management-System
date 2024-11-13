@extends('dashboard.layout.adminmain')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Recent User</h4>
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
                <div class="row mt-3">
                    <div class="col-md-12 d-flex justify-content-end">
                        <!-- Add Members Button wrapped with <a> and aligned to the right -->
                        <a href="/register" class="btn btn-primary">
                            Add User
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-striped table-nowrap">
                        <thead>
                            <tr>
                                <th>S.N </th>
                                <th>User Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Create Date</th>
                                <th>Branch</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_user as $user)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td class="table-user">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">{{ $user->name }}</a>
                                </td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at ? $user->created_at->format('Y-m-d') : 'N/A' }}</td>
                                <td>{{ $user->branch ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-right flex gap-4">
                                    <a href="/user-edit/{{ $user->id }}" class="font-medium text-blue-600 hover:underline">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                    </a>
                                    @if(Auth::user()->role === 'admin') <!-- Check if the authenticated user has the 'admin' role -->
                                    <a href="/user-delete/{{ $user->id }}" class="font-medium text-red-600 hover:underline">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->


    <!-- end row-->

</div> <!-- container -->

@endsection