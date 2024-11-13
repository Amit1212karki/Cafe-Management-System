@extends('dashboard.layout.adminmain')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
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
                <form action="{{ route('update-user', $edit_user->id) }}" method="POST">
                    @csrf

                    <div class="row">
                    
                        <div class="mb-2 col-md-6">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" name="name" value="{{$edit_user->name}}" type="text" id="name" required placeholder="Enter your name">
                        </div>

                        <div class="mb-2 col-md-6">
                            <label class="form-label" for="emailaddress">Email address</label>
                            <input class="form-control" name="email" value="{{$edit_user->email}}" type="email" id="emailaddress" required=""
                                placeholder="Enter your email">
                        </div>

                        <div class="mb-2 col-md-6">
                            <a href="pages-recoverpw.html"
                                class="text-muted float-end"><small></small></a>
                            <label class="form-label" for="branch">Branch</label>
                            <input class="form-control" name="branch" value="{{$edit_user->branch}}" type="branch" required="" id="branch"
                                placeholder="Enter your branch">
                        </div>

                    </div>
                    <div class="row mt-3">
                            <div class="mb-2 col-md-12">

                                <button type="submit" class="btn btn-primary text-center">Update</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection