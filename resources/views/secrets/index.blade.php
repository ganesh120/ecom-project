@extends('dashboard')
@section('content')
    @if (session('secretssuccess'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>&nbsp;&nbsp;
            <div><strong>{{ session('secretssuccess') }}</strong></div>
        </div><br>
    @endif

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="metismenu-icon fas fa-key"></i>
                </div>
                <div><b><u>Secret Table</b></u>
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

            <head>
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                    <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
                    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            </head>
            <thead>
                <tr>
                    <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    {{-- <th>Image</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($secret as $secret)
                    <tr>
                        <tr align="center">
                        <td>{{ $secret->id }}</td>
                        <td>{{ $secret->name }}</td>
                        <td>{{ $secret->slug }}</td>
                        <td><a href="{{ route('secrets.edit', $secret->id) }}"><button type="button"
                                    class="btn btn-success">Edit</button></a>
                            <a href="{{ route('secrets.delete', $secret->id) }}"><button type="button"
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    {{-- <th>Name</th> --}}
                </tr>
            </tfoot>
            </table>
        </div>
    </div>
    {{-- </div> --}}
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
