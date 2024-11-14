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
                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label"> Bill no </label>
                                        <input type="text" class="form-control" id="billno">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label"> Bill Amount</label>
                                        <input type="text" class="form-control"  id="mobileno">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label"> Point </label>
                                        <input type="text" class="form-control"  disabled id="mobileno">
                                    </div>


                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label">Form No</label>
                                        <input type="text" class="form-control" value="${member.form_no}" disabled id="formno">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label">Card No</label>
                                        <input type="text" class="form-control" value="${member.card_no}" disabled id="cardno">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label">Date (AD)</label>
                                        <input class="form-control" type="date" value="${member.date}" disabled name="date"
                                            id="example-date">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label">Full Name</label>
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
                                        <input type="email" class="form-control" disabled
                                            id="inputEmail4" value="${member.email}" placeholder="Email">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputAddress" class="form-label">Address</label>
                                        <input type="text" class="form-control" disabled
                                            id="inputAddress"  value="${member.address}" placeholder="1234 Main St">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputAddress" class="form-label">Date of Birth
                                            (AD)</label>
                                        <input class="form-control" value="${member.dob}" type="date" name="date" disabled
                                            id="example-date">
                                    </div>

                                    <div class="mb-2 col-md-4">
                                        <label for="inputZip" class="form-label">Mobile NO </label>
                                        <input type="text" class="form-control" value="${member.phone}" disabled id="mobileno">
                                    </div>



                                </div>
                `;
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