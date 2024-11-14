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
                axios.get('/batch', {
                        params: {
                            search: searchQuery
                        },
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(function(response) {
                        console.log("Response data:", response.data);
                        const member = response.data;
                        const memberDetailsDiv = document.getElementById('member-details');

                        // Display the member's details in HTML
                        memberDetailsDiv.innerHTML = `
                    <div class="row">
                        <div class="col-md-4"><strong>Full Name:</strong> ${member.full_name}</div>
                        <div class="col-md-4"><strong>Email:</strong> ${member.email}</div>
                        <div class="col-md-4"><strong>Gender:</strong> ${member.gender}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><strong>Address:</strong> ${member.address}</div>
                        <div class="col-md-4"><strong>Phone:</strong> ${member.phone}</div>
                        <div class="col-md-4"><strong>Card No:</strong> ${member.card_no}</div>
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