@extends('dashboard.layout.adminmain')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form id="search-form">
                        <div class="row">
                            <div class="col-md-9 mb-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter card no / phone" id="search-query" aria-label="Search query">
                                    <button class="btn btn-dark waves-effect waves-light" type="button" id="search-button">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div id="member-details">
                        <!-- Member details will appear here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- content -->


<style>
    .knob-input {
        width: 64px;
        height: 40px;
        position: absolute;
        vertical-align: middle;
        margin-top: 40px;
        margin-left: -92px;
        border: 0;
        background: none;
        font: bold 24px Arial;
        text-align: center;
        color: #31cb72;
        padding: 0;
        appearance: none;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Handle search button click to get and display member details
    document.getElementById('search-button').addEventListener('click', function() {
        let searchQuery = document.getElementById('search-query').value;

        if (searchQuery) {
            axios.get('/add-admin-point', {
                    params: {
                        search: searchQuery
                    },
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    console.log("Response data:", response.data);
                    const member = response.data;
                    const memberDetailsDiv = document.getElementById('member-details');

                    // Display the member's details in HTML
                    memberDetailsDiv.innerHTML = `
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
                                <label for="formno" class="form-label">Form No</label>
                                <input type="text" class="form-control" value="${member.form_no}" disabled id="formno">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label for="cardno" class="form-label">Card No</label>
                                <input type="text" class="form-control" value="${member.card_no}" disabled id="cardno">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label for="example-date" class="form-label">Date (AD)</label>
                                <input class="form-control" type="date" value="${member.date}" disabled name="date" id="example-date">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text" class="form-control" value="${member.name}" disabled id="fullname">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label for="inputState" class="form-label">Gender</label>
                                <select id="inputState" disabled class="form-select">
                                    <option>Choose</option>
                                    <option ${member.gender === 'Male' ? 'selected' : ''}>Male</option>
                                    <option ${member.gender === 'Female' ? 'selected' : ''}>Female</option>
                                </select>
                            </div>
                            <div class="mb-2 col-md-4">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" disabled id="inputEmail4" value="${member.email}" placeholder="Email">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label for="inputAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" disabled id="inputAddress" value="${member.address}" placeholder="1234 Main St">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label for="example-date" class="form-label">Date of Birth (AD)</label>
                                <input class="form-control" value="${member.dob}" type="date" name="date" disabled id="example-date">
                            </div>
                            <div class="mb-2 col-md-4">
                                <label for="mobileno" class="form-label">Mobile NO </label>
                                <input type="text" class="form-control" value="${member.phone}" disabled id="mobileno">
                            </div>
                            </div>

                        </div>
                        <div class="mb-2 col-md-3">
                                <div class="card m-b-0">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div style="display:inline;width:120px;height:120px;">
                                               <input class="knob-input" data-plugin="knob" data-width="120"
                                    data-height="120" data-linecap="round"
                                    data-fgcolor="#31cb72" value="80" data-skin="tron"
                                    data-angleoffset="180" data-readonly="true"
                                    data-thickness=".1" readonly="readonly"
                                    style="width: 64px; height: 40px; position: absolute; vertical-align: middle; margin-top: 40px; margin-left: -92px; border: 0px; background: none; font: bold 24px Arial; text-align: center; color: rgb(49, 203, 114); padding: 0px; appearance: none;">
                            </div>
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
                `;
                    $(".knob-input").knob();
                })
                .catch(function(error) {
                    const memberDetailsDiv = document.getElementById('member-details');
                    if (error.response && error.response.status === 404) {
                        memberDetailsDiv.innerHTML = `<p>Member not found.</p>`;
                    } else {
                        memberDetailsDiv.innerHTML = `<p>An error occurred while fetching member details.</p>`;
                    }
                });
        } else {
            alert('Please enter a card number or phone to search.');
        }
    });
</script>


@endsection