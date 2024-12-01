@extends('dashboard.layout.main')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Dashboard</h4>
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

    <div class="row">
        @foreach($branches as $branch)
        @php
        $totalMembers = $branch->members_count; // Total members count for the branch
        $branchName = $branch->branch; // Branch name
        $color = $branchColors[$branchName] ?? '#20bdbe'; // Default color if not defined
        @endphp

        <div class="col-xl-2">
            <div class="card m-b-20">
                <div class="card-body">
                    <div class="text-center">
                        <input
                            data-plugin="knob"
                            data-width="120"
                            data-height="120"
                            data-linecap="round"
                            data-max="1e+308"
                            data-fgColor="{{ $color }}"
                            value="{{ $totalMembers }}"
                            data-skin="tron"
                            data-angleOffset="180"
                            data-readOnly="true"
                            data-thickness=".1" />
                        <div class="clearfix"></div>
                    </div>
                    <h4 class="card-title text-center">
                        {{ $branchName }}
                    </h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- end row -->


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Recent Customers</h4>
                    <p class="card-subtitle mb-4 font-size-13">Transaction period from 21 July to 25 Aug
                    </p>

                    <div class="table-responsive">
                        <table class="table table-centered table-striped table-nowrap">
                            <thead>
                                <tr>
                                    <th>Card No </th>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Create Date</th>
                                    <th>Branch</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_members as $member)
                                <tr>
                                    <th>{{$member->card_no}} </th>
                                    <td class="table-user">
                                        <a href="javascript:void(0);" class="text-body font-weight-semibold">{{$member->name}}</a>
                                    </td>
                                    <td>{{$member->phone}}</td>
                                    <td>{{$member->email}}</td>
                                    <td>{{$member->address}}</td>
                                    <td>{{$member->created_at->format('d-m-Y')}}</td>
                                    <td>{{$member->user->branch}}</td>
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

</div> <!-- content -->

@endsection