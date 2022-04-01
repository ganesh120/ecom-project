@extends('dashboard')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon fas fa-box-open"></i>
                </div>
                <div><b><u>Product Form</b></u>
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
            {{-- <h5 class="card-title">Product form</h5> --}}
            <form id="signupForm" class="col-md-10 mx-auto" method="post" action="{{ route('product.store') }}"
                novalidate="novalidate" enctype='multipart/form-data'>
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
                    <label for="name">Name</label>
                    <div>
                        <input type="text" class="form-control" id="name" name="name" placeholder=" name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <div>
                        <input type="text" class="form-control" id="description" name="description"
                            placeholder="description">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price">price</label>
                    <div>
                        <input type="text" class="form-control" id="price" name="price" placeholder="price">
                    </div>
                </div>
                <div class="form-group">
                    <label for="discount">Discount</label>
                    <div>
                        <input type="text" class="form-control" id="discount" name="discount" placeholder="discount">
                    </div>
                </div>
                <div class="form-group">
                    <label for="secret_code">SECRET CODE</label>
                    <div>
                        <select name="secret_code" select id="secret_code" class="form-control">
                            <option value="secret_code">secret code</option>
                            @foreach ($secrets as $secret)
                                <option value="{{ $secret->id }}">{{ $secret->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status">status</label>
                    <select name="status" select id="status" class="form-control">
                        <option value="" class="option_colour">select status</option>
                        <option>Active</option>
                        <option>Deactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" name="image" class="form-label">PRODUCT IMAGE</label>
                    <input type="file" class="form-label" id="image" name="image">
                </div>
                <div class="form-group">
                    <div>

                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Add Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection
