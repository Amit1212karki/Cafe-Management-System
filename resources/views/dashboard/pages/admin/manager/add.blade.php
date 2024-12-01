@extends('dashboard.layout.adminmain')
@section('content')
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

                        <div class="col-md-9">
                            <div class="row">


                                <div class="mb-2 col-md-4">
                                    <label for="inputZip" class="form-label">ID No</label>
                                    <input type="text" class="form-control" id="formno">
                                </div>

                                <div class="mb-2 col-md-4">
                                    <label for="inputZip" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="fullname">
                                </div>


                                <div class="mb-2 col-md-4">
                                    <label for="inputState" class="form-label">Choose branch</label>
                                    <select id="inputState" class="form-select">
                                        <option>Choose</option>
                                        <option>Maharajgung</option>
                                        <option>battisputali</option>


                                    </select>
                                </div>

                                <div class="mb-2 col-md-4">
                                    <label for="inputZip" class="form-label">Join Date (AD)</label>
                                    <input class="form-control" type="date" name="date" id="example-date">
                                </div>


                                <div class="mb-2 col-md-4">
                                    <label for="inputState" class="form-label">Gender</label>
                                    <select id="inputState" class="form-select">
                                        <option>Choose</option>
                                        <option>Male</option>
                                        <option>Female</option>


                                    </select>
                                </div>

                                <div class="mb-2 col-md-4">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                </div>

                                <div class="mb-2 col-md-4">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                </div>

                                <div class="mb-2 col-md-4">
                                    <label for="inputAddress" class="form-label">Date of Birth (AD)</label>
                                    <input class="form-control" type="date" name="date" id="example-date">
                                </div>

                                <div class="mb-2 col-md-4">
                                    <label for="inputZip" class="form-label">Mobile NO </label>
                                    <input type="text" class="form-control" id="mobileno">
                                </div>



                            </div>
                            <div class="mb-2 col-md-12 py-2 py-lg-2"> Branch staff details </div>
                            <hr>
                            <div class="row">



                                <div class="mb-2 col-md-3">
                                    <label for="inputAddress" class="form-label">Reception/counter</label>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>

                                <div class="mb-2 col-md-3">
                                    <label for="inputAddress" class="form-label">Supervisior</label>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>

                                <div class="mb-2 col-md-3">
                                    <label for="inputAddress" class="form-label">Capation</label>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>

                                <div class="mb-2 col-md-3">
                                    <label for="inputAddress" class="form-label">Waiter exprence</label>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>


                                <div class="mb-2 col-md-3">
                                    <label for="inputAddress" class="form-label">Waiter fresher</label>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>

                                <div class="mb-2 col-md-3">
                                    <label for="inputAddress" class="form-label">Chef</label>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>

                                <div class="mb-2 col-md-3">
                                    <label for="inputAddress" class="form-label">Cook</label>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>

                                <div class="mb-2 col-md-3">
                                    <label for="inputAddress" class="form-label">Helper</label>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>

                                <div class="mb-2 col-md-3">
                                    <label for="inputAddress" class="form-label">Utility/dis washer staff</label>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>

                                <div class="mb-2 col-md-3">
                                    <label for="inputAddress" class="form-label">House Keeping </label>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>

                                <div class="mb-2 col-md-3">
                                    <label for="inputAddress" class="form-label">Security Card </label>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>


                                <div class="mb-2 col-md-3">
                                    <label for="inputAddress" class="form-label">Driver </label>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>







                            </div>
                        </div>
                        <div class="mb-2 col-md-3">
                            <div class="card m-b-0">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div style="display:inline;width:120px;height:120px;">
                                            <img src="assets/images/users/avatar-3.jpg" alt="user-image" class="rounded-circle">

                                            <div class="col-md-10 py-2 py-lg-2">
                                                <input type="file" class="form-control" id="example-fileinput">
                                            </div>
                                            <div class="clearfix"></div>
                                            <a href="#" class="btn btn-sm btn-light mt-2"></a>
                                        </div>

                                    </div>
                                    <h4 class="card-title text-center">upload photo </h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2  py-lg-4 mt-10 col-md-9 center text-center">

                                <button type="submit" class="btn btn-primary text-center">Add Manager</button>
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

@endsection