@extends('dashboard')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon fas fa-users"></i>
                </div>
                <div><b><u>Users Form</b></u>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span> Inbox</span>
                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="main-card mb-3 card">
        <div class="card-body">
            {{-- <h5 class="card-title">USERS FORM</h5> --}}
            <form id="signupForm" class="col-md-10 mx-auto" method="post" action="{{ route('users.store') }}"
                novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                <div class="form-group">
                    <label for="name">NAME</label>
                    <div>
                        <input type="text" class="form-control" id="name" name="name" placeholder=" name here">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">EMAIL</label>
                    <div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email here">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">PASSWORD</label>
                    <div>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="password here">
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobile">MOBILE</label>
                    <div>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="mobile here">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">ADDRESS</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="address here">
                </div>
                <div class="form-group">
                    <label for="country-dd">COUNTRY</label>
                    <div>
                        <select name="country_id" select id="country-dd" class="form-control">
                            <option value="">Select Country</option>
                            @foreach ($countries as $data)
                                <option value="{{ $data->id }}">
                                    {{ $data->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="state_id">STATE</label>
                    <div class="form-group mb-3">
                        <select name="state_id" select id="state-dd" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city">CITY</label>
                    <div class="form-group">
                        <select name="city_id" select id="city-dd" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pin_code">PIN CODE</label>
                    <input type="text" class="form-control" id="pin_code" name="pin_code" placeholder="Pin code here">
                </div>
                <div class="form-group">
                    <label for="role">ROLES</label>
                    <div>
                        <select name="role_id" select id="role" class="form-control">
                            <option value="">select roles</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" name="image" class="form-label">USER IMAGE</label>
                    <input type="file" class="form-label" id="image" name="image">
                </div>
                </select>
                <div class="form-group">
                    <div>
                        {{-- <div class="form-check">
                            <input type="checkbox" id="agree" name="agree" value="agree" class="form-check-input">
                            <label class="form-check-label">Please agree to our policy</label>
                        </div> --}}
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="Add_new_user" value="Add_new_user">Add new
                        user</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country-dd').on('change', function() {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{ url('api/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state-dd').on('change', function() {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function(key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
