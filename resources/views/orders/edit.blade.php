{{-- @extends('dashboard')
@section( 'content')
 <div class="container mt-5">

        <form   method="post" action="{{route('orders.update', $order->id)}}">
            @method('POST')
            @csrf
        <h1>Enter Order Details</h1>
        <div class="mb-3 col-md-3">
            <label for="user_id" name="user_id">Product ID</label><br>
            <input type="text" id="user_id" name="user_id" value="{{$order->user_id}}" ><br>
        </div>

        <div class="mb-3 col-md-3">
            <label for="product_id" name="product_id">Product ID</label><br>
            <input type="text" id="product_id" name="product_id" value="{{$order->product_id}}" ><br>
        </div>
        <div class="mb-3 col-md-3">
            <label for="price" name="price">Price</label><br>
            <textarea id="price" name="price" value="{{$order->price}}" ></textarea><br>
        </div>
        <div class="mb-3 col-md-3">
            <label for="tax" name="tax">Tax</label><br>
            <input type="text" id="tax" name="tax" value="{{$order->tax}}"><br>
        </div>
        <div class="mb-3 col-md-3">
            <label for="delivery_charges" name="delivery_charges">Delivery charges</label><br>
            <input type="text" id="delivery_charges" name="delivery_charges" value="{{$order->delivery_charges}}"><br>
        </div>
        <div class="mb-3 col-md-3">
            <label for="quantity" name="quantity">Quantity</label><br>
            <input type="text" id="quantity" name="quantity" value="{{$order->quantity}}"><br>
        </div>
        <div class="mb-3 col-md-3">
            <label for="total" name="total">Total</label><br>
            <input type="text" id="total" name="total" value="{{$order->total}}" ><br>
        </div>
        <div class="form-group">
            <h5 class="card-title">Status</h5>
            <div>
                <select  id="status" name="status" class="form-control">
                    <option value="" class="option_color">Select Status</option>
                    <option>Ordered</option>
                    <option>Unordered</option>
                </select>
            </div>
        </div>
        <div class="mb-3 col-md-3">
            <label for="tracking_number" name="tracking_number">Tracking number</label><br>
            <input type="text" id="tracking_number" name="tracking_number" value="{{$order->tracking_number}}"><br>
        </div>
        <input type="reset" value="Reset">

        <button>Submit</button>
        </form>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


@endsection --}}

@extends('dashboard')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon fas fa-shopping-cart"></i>
                </div>
                <div><b><u>Order Edit Form</b></u>
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
    <div class="card-body">
        <h5 class="card-title">Order edit form</h5>
        <form id="signupForm" class="col-md-10 mx-auto" method="post" action="{{ route('orders.update', $order->id) }}"
            novalidate="novalidate" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="user_id">User </label>
                <div>
                    <input type="text" class="form-control" id="user_id" name="user_id" placeholder="user id here"
                        value="{{ $order->user_id}}">
                </div>
            </div>
            <div class="form-group">
                <label for="product_id">Product</label>
                <div>
                    <input type="text" class="form-control" id="product_id" name="product_id"
                        placeholder="product id here" value="{{ $order->product_id }}">
                </div>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <div>
                    <input type="text" class="form-control" id="price" name="price" placeholder="price here"
                        value="{{ $order->price }}">
                </div>
            </div>
            <div class="form-group">
                <label for="tax">Tax</label>
                <div>
                    <input type="text" class="form-control" id="tax" name="tax" placeholder="tax here"
                        value="{{ $order->tax }}">
                </div>
            </div>
            <div class="form-group">
                <label for="delivery_charges">Delivery charges</label>
                <div>
                    <input type="text" class="form-control" id="delivery_charges" name="delivery_charges"
                        placeholder="delivery charges here" value="{{ $order->delivery_charges }}">
                </div>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <div>
                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="quantity here"
                        value="{{ $order->quantity }}">
                </div>
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <div>
                    <input type="text" class="form-control" id="total" name="total" placeholder="total here"
                        value="{{ $order->total }}">
                </div>
            </div>
            <div class="form-group">
                <label for="status">status</label>
                <select name="status" select id="status" class="form-control">
                    <option value="" class="option_colour">select status</option>
                    <option>Odered</option>
                    <option>Cancle</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tracking_no">Tracking no</label>
                <div>
                    <input type="text" class="form-control" id="tracking_no" name="tracking_no"
                        placeholder="tracking here" value="{{ $order->tracking_no }}">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Update</button>
            </div>
        </form>
    </div>
@endsection


