@extends('dashboard.layout.adminmain')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Edit points on previlage card </h4>
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
    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"></h4>
                    <p class="sub-header">

                    </p>

                    <form>
                        <div class="row">

                            <div class="col-md-9 mb-5">
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                        placeholder="enter card no / phone "
                                        aria-label="Recipient's username">

                                    <button class="btn btn-dark waves-effect waves-light"
                                        type="button">search</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-9">
                                <div class="row">
                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label"> Bill no </label>
                                        <input type="text" class="form-control" id="billno">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label"> Bill Amount</label>
                                        <input type="text" class="form-control" id="mobileno">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label"> Point </label>
                                        <input type="text" class="form-control" disabled id="mobileno">
                                    </div>


                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label">Form No</label>
                                        <input type="text" class="form-control" disabled id="formno">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label">Card No</label>
                                        <input type="text" class="form-control" disabled id="cardno">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label">Date (AD)</label>
                                        <input class="form-control" type="date" disabled name="date"
                                            id="example-date">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" disabled id="fullname">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputState" class="form-label">Gender</label>
                                        <select id="inputState" disabled class="form-select">
                                            <option>Choose</option>
                                            <option>Male</option>
                                            <option>Female</option>


                                        </select>
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="email" class="form-control" disabled
                                            id="inputEmail4" placeholder="Email">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputAddress" class="form-label">Address</label>
                                        <input type="text" class="form-control" disabled
                                            id="inputAddress" placeholder="1234 Main St">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputAddress" class="form-label">Date of Birth
                                            (AD)</label>
                                        <input class="form-control" type="date" name="date" disabled
                                            id="example-date">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label">Mobile NO </label>
                                        <input type="text" class="form-control" disabled id="mobileno">
                                    </div>



                                </div>

                            </div>
                            <div class="mb-2 col-md-3">
                                <div class="card m-b-0">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div style="display:inline;width:120px;height:120px;">
                                                <input data-plugin="knob" data-width="120"
                                                    data-height="120" data-linecap="round"
                                                    data-fgcolor="#31cb72" value="80" data-skin="tron"
                                                    data-angleoffset="180" data-readonly="true"
                                                    data-thickness=".1" readonly="readonly"
                                                    style="width: 64px; height: 40px; position: absolute; vertical-align: middle; margin-top: 40px; margin-left: -92px; border: 0px; background: none; font: bold 24px Arial; text-align: center; color: rgb(49, 203, 114); padding: 0px; appearance: none;">
                                            </div>

                                            <div class="clearfix"></div>
                                            <a href="#" class="btn btn-sm btn-light mt-2"></a>
                                        </div>

                                    </div>
                                    <h4 class="card-title text-center">Gain Points </h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2  py-lg-4 mt-10 col-md-9 center text-center">

                                <button type="submit"
                                    class="btn btn-primary text-center">Update</button>
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