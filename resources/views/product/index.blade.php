 @extends('dashboard')
@section('content')
    @if (session('productsuccess'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>&nbsp;&nbsp;
            <div><strong>{{ session('productsuccess') }}</strong></div>
        </div><br>
    @endif
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon fas fa-box-open"></i>
                </div>
                <div><b><u>Product Table</b></u>
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
    <a href="{{ route('product.create') }}"> <button type="button" class="btn btn-primary">Add new Product</button></a>


    {{-- <div class="alert alert-primary" role="alert">
                @if (session()->has('success'))
                    <h5>{{ session()->get('success') }}</h5>
                @endif
            </div> --}}

     <head>
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
            <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    </head>
    <table style="width: 100%;" id="table_id" class="table table-hover table-striped table-bordered">
    <thead id="table_id">
        <tr>
            <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Secret Code</th>
            <th>Status</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product as $product)
            <tr>
                <tr align="center">
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->discount }}</td>
                <td>{{ $product->secret_code }}</td>
                <td>
                    @if ($product->status == 'Active')
                        <div class="badge badge-success">{{ $product->status }}</div>
                    @elseif($product->status == 'Dective')
                        <div class="badge badge-success">{{ $product->status }}</div>
                    @else
                        <div class="badge badge-danger">{{ $product->status }}</div>
                    @endif
                </td>
                <td><img src="/user_images/{{ $product->image }}" width="100px"></td>
                <td><a href="{{ route('product.edit', $product->id) }}"><button type="button"
                            class="btn btn-success">Edit</button></a>
                    <a href="{{ route('product.delete', $product->id) }}"><button type="button"
                            class="btn btn-danger">Delete</button></a>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>

    <tfoot>
    </tfoot>
    </table>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
@endsection





