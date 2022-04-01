@extends('dashboard')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon fas fa-gem"></i>
                </div>
                <div><b><u>Transaction Edit Form</b></u>
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
        <h5 class="card-title">transaction edit form</h5>
        <form id="signupForm" class="col-md-10 mx-auto" method="post"
            action="{{ route('transactions.update', $transaction->id) }}" novalidate="novalidate">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="id">ID</label>
                <div>
                    <input type="text" class="form-control" id="id" name="id" placeholder=" id here"
                        value="{{ $transaction->id }}">
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">ORDER ID</h5>
                <div>
                    <select name="order_id" id="order_id" class="form-control">
                        <option value="" class="option_color">Select Order Id</option>
                        @foreach ($orders as $order)
                            <option value="{{$order->id}}" {{$transaction->order_id == $transaction->id  ? 'selected' : ''}}>{{$order->id}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">MODE</h5>
                <div>
                    <select name="mode" id="mode" class="form-control">
                        <option value="" class="option_color">Select Mode</option>
                        <option {{$transaction->mode == 'COD'  ? 'selected' : ''}}>COD</option>
                        <option {{$transaction->mode == 'Online'  ? 'selected' : ''}}>Online</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <h5 class="card-title">TYPE</h5>
                <div>
                    <select name="type" id="type" class="form-control">
                        <option value="" class="option_color">Select Type</option>
                        <option {{$transaction->type == 'Active'  ? 'selected' : ''}}>Active</option>
                        <option {{$transaction->type == 'Inactive'  ? 'selected' : ''}}>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
