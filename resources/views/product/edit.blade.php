@extends('dashboard')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon fas fa-box-open"></i>
                </div>
                <div><b><u>Product Edit Form</b></u>
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
            <h5 class="card-title">Product form</h5>
            <form id="signupForm" class="col-md-10 mx-auto" method="post"
                action="{{ route('product.update', $product->id) }}" novalidate="novalidate"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <div>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <div>
                        <input type="text" class="form-control" id="description" name="description"
                            value="{{ $product->description }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price">price</label>
                    <div>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="discount">Discount</label>
                    <div>
                        <input type="text" class="form-control" id="discount" name="discount"
                            value="{{ $product->discount }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="SECRET CODE">SECRET CODE</label>
                    <div>
                        <input type="text" class="form-control" id="secret_code" name="secret_code"
                            value="{{ $product->secret_code }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="status">status</label>
                    <input type="text" class="form-control" id="status" name="status" value="{{ $product->status }}">
                </div>
                <div class="form-group">
                    <label for="image" name="image" class="form-label">PRODUCT IMAGE</label>
                    <input type="file" class="form-label" id="image" name="image"><br>
                    <img src="/user_images/{{ $product->image }}" width="300px">
                </div>
                <div class="form-group">
                    <div>
                        {{-- <div class="form-check">
                            <input type="checkbox" id="agree" name="agree" value="agree" class="form-check-input">
                            <label class="form-check-label">Please agree to our policy</label>
                        </div> --}}
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Update product</button>
                </div>
            </form>
        </div>
    </div>
@endsection
