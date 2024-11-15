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

<!-- Add some custom styles if needed -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-knob/dist/jquery.knob.min.js"></script>

<script>
    var storeUrl = "{{ route('admin-point-store') }}";
    axios.defaults.headers.common['X-CSRF-TOKEN'] = "{{ csrf_token() }}";

    // Search functionality
    document.getElementById('search-button').addEventListener('click', function() {
        const searchQuery = document.getElementById('search-query').value;

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
                    const member = response.data;
                    const memberDetailsDiv = document.getElementById('member-details');


                    memberDetailsDiv.innerHTML = `
                    <form id="update-form" method="POST" action="{{ route('admin-point-store') }}">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                
                                   <input type="hidden" id="user-id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" id="member-id" value="${member.id}">

                                <div class="mb-2 col-md-4">
                                    <label for="inputZip" class="form-label"> Bill no </label>
                                    <input type="text" class="form-control" id="billno">
                                </div>
                                <div class="mb-2 col-md-4">
                                        <label for="billamount" class="form-label">Bill Amount</label>
                                        <input type="text" class="form-control" id="billamount">
                                    </div>

                                <div class="mb-2 col-md-4">
                                        <label for="point" class="form-label">Point</label>
                                        <input type="text" class="form-control"  disabled id="point">
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
                                    <option ${member.gender === 'M' ? 'selected' : ''}>Male</option>
                                    <option ${member.gender === 'F' ? 'selected' : ''}>Female</option>
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
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div style="display:inline;width:120px;height:120px;">
                                            <input class="knob-input" data-plugin="knob" data-width="120"
                                            data-height="120" data-linecap="round" data-fgcolor="#31cb72"
                                            value="0" data-skin="tron" data-angleoffset="180" data-readonly="true"
                                            data-thickness=".1" id="knob-point" data-min="0" data-max="1" data-step="0.0001">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title text-center">Gain Points</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-2  py-lg-4 mt-10 col-md-9 center text-center">
                               <button id="submit-point" class="btn btn-primary">Save Point</button>
                                <button type="cancel" class="btn btn-primary">Cancle </button>
                            </div>
                        </div> 
                    </div>
                    </form>
                `;
                    $(".knob-input").knob(); // Initialize the knob
                })
                .catch(error => {
                    const memberDetailsDiv = document.getElementById('member-details');
                    memberDetailsDiv.innerHTML = `<p>An error occurred while fetching member details.</p>`;
                });
        } else {
            alert('Please enter a card number or phone to search.');
        }
    });


    // Calculate points based on bill amount
    document.addEventListener('input', function(e) {
        if (e.target.id === 'billamount') {
            const billAmount = parseFloat(e.target.value) || 0;
            const points = (billAmount / 1000).toFixed(5); // Convert bill amount to points
            document.getElementById('point').value = points;
            $('#knob-point').val(points).trigger('change'); // Update knob
        }
    });
    document.getElementById('update-form').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent the form from submitting
        }
    });
    document.getElementById('submit-point').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default button behavior

        // Get form values
        const billNo = document.getElementById('billno').value;
        const billAmount = document.getElementById('billamount').value;
        const points = document.getElementById('point').value;
        const memberId = document.getElementById('member-id').value; // member ID
        const userId = document.getElementById('user-id').value; // user ID

        // Validate form values
        if (billNo && billAmount && points && memberId && userId) {
            // Send the data to the backend via AJAX (axios)
            axios.post(storeUrl, {
                    billno: billNo,
                    billamount: billAmount,
                    points: points,
                    member_id: memberId,
                    user_id: userId,
                })
                .then(response => {
                    // Handle success
                    alert(response.data.message); // Or update the UI as needed
                })
                .catch(error => {
                    // Handle error
                    console.error(error);
                    alert('Error saving data');
                });
        } else {
            alert('Please fill in all fields.');
        }
    });
</script>

@endsection