@extends('dashboard')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon fas fa-user-tag"></i>
                </div>
                <div><b><u>Role Edit Form</b></u>
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
            <h5 class="card-title">Add Role Form</h5>
            <form id="signupForm" class="col-md-10 mx-auto" method="post" action="{{ route('roles.update', $role->id) }}"
                novalidate="novalidate">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <div>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="slug">slug</label>
                    <div>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $role->slug }}">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="Update_Role " value="Update_Role">Update_Role</button>
                </div>
            </form>
        </div>
    </div>
@endsection
