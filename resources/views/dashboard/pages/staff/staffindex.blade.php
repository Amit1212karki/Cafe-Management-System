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
                                <tr>
                                    <th>00099 </th>
                                    <td class="table-user">

                                        <a href="javascript:void(0);"
                                            class="text-body font-weight-semibold">Paul J. Friend</a>
                                    </td>
                                    <td>
                                        937-330-1634
                                    </td>
                                    <td>
                                        pauljfrnd@jourrapide.com
                                    </td>
                                    <td>
                                        New York
                                    </td>
                                    <td>
                                        07/07/2018
                                    </td>
                                    <td>Balaju </td>
                                </tr>

                                <tr>
                                    <th>00099 </th>
                                    <td class="table-user">

                                        <a href="javascript:void(0);"
                                            class="text-body font-weight-semibold">Bryan J. Luellen</a>
                                    </td>
                                    <td>
                                        215-302-3376
                                    </td>
                                    <td>
                                        bryuellen@dayrep.com
                                    </td>
                                    <td>
                                        New York
                                    </td>
                                    <td>
                                        09/12/2018
                                    </td>
                                    <td>battishputali </td>
                                </tr>
                                <tr>
                                    <th>00099 </th>
                                    <td class="table-user">

                                        <a href="javascript:void(0);"
                                            class="text-body font-weight-semibold">Kathryn S.
                                            Collier</a>
                                    </td>
                                    <td>
                                        828-216-2190
                                    </td>
                                    <td>
                                        collier@jourrapide.com
                                    </td>
                                    <td>
                                        Canada
                                    </td>
                                    <td>
                                        06/30/2018
                                    </td>
                                    <td>
                                        kalanki
                                    </td>
                                </tr>
                                <tr>
                                    <th>00099 </th>
                                    <td class="table-user">

                                        <a href="javascript:void(0);"
                                            class="text-body font-weight-semibold">Timothy Kauper</a>
                                    </td>
                                    <td>
                                        (216) 75 612 706
                                    </td>
                                    <td>
                                        thykauper@rhyta.com
                                    </td>
                                    <td>
                                        Denmark
                                    </td>
                                    <td>
                                        09/08/2018
                                    </td>
                                    <td>Balaju </td>
                                </tr>
                                <tr>
                                    <th>00099 </th>
                                    <td class="table-user">

                                        <a href="javascript:void(0);"
                                            class="text-body font-weight-semibold">Zara Raws</a>
                                    </td>
                                    <td>
                                        (02) 75 150 655
                                    </td>
                                    <td>
                                        austin@dayrep.com
                                    </td>
                                    <td>
                                        Germany
                                    </td>
                                    <td>
                                        07/15/2018
                                    </td>
                                    <td>Balaju </td>
                                </tr>

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