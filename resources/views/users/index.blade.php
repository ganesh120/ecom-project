 @extends('dashboard')
 @section('content')
     @if (session('usersuccess'))
         <div class="alert alert-success d-flex align-items-center" role="alert">
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                 class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
                 <path
                     d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
             </svg>&nbsp;&nbsp;
             <div><strong>{{ session('usersuccess') }}</strong></div>
         </div><br>
     @endif

     <div class="app-page-title">
         <div class="page-title-wrapper">
             <div class="page-title-heading">
                 <div class="page-title-icon">
                     <i class="metismenu-icon fas fa-users"></i>
                 </div>
                 <div><b><u>Users Table</u></b>
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
     <a href="{{ route('users.create') }}"> <button type="button" style="float:right" class="btn btn-primary">Add new
             User</button></a><br>


     <div class="card-body">

         <head>
             <table style="width: 100%;" id="datatable" class="table table-hover table-striped table-bordered">
                 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
                 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
                 <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
                 <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

         </head>
         <table id="datatable" class="display">
             <thead>
                 <tr align="center">
                     <th>ID</th>
                     <th>Image</th>
                     <th>Name</th>
                     <th>Email </th>
                     <th>Mobile </th>
                     <th>Address</th>
                     <th>Country</th>
                     <th>State</th>
                     <th>City</th>
                     <th>Pin Code</th>
                     <th>Role Id</th>
                     <th>Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($user as $user)
                     <tr align="center">
                         <td>{{ $user->id }}</td>
                         <td>
                             @if ($user->image == 'NULL')
                                 <img src="{{ 'user.png' }}" width="50" class="rounded">
                             @else
                                 <img src="/user_images/{{ $user->image }}" width="50" class="rounded">
                             @endif
                         </td>
                         <td>{{ $user->name }}</td>
                         <td>{{ $user->email }}</td>
                         <td>{{ $user->mobile }}</td>
                         <td>{{ $user->address }}</td>
                         <td>{{ @$user->country->name }}</td>
                         <td>{{ @$user->state->name }}</td>
                         <td>{{ @$user->city->name }}</td>
                         <td>{{ $user->pin_code }}</td>
                         <td>{{ @$user->role->name }}</td>
                         <td><a href="{{ route('users.edit', $user->id) }}"><button type="button"
                                     class="btn btn-success">Edit</button></a><br>
                             <br>
                             <a href="{{ route('users.delete', $user->id) }}"><button type="button"
                                     class="btn btn-danger">Delete</button></a>
                         </td>
                     </tr>
                 @endforeach
         </table>
         <script>
             $(document).ready(function() {
                 $('#datatable').DataTable();
             });
         </script>
         </tbody>
     </div>
 @endsection
