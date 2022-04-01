

@extends('dashboard')
@section('content')
@if (session('rolesuccess'))
<div class="alert alert-success d-flex align-items-center" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
        class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
        <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </svg>&nbsp;&nbsp;
    <div><strong>{{ session('rolesuccess') }}</strong></div>
</div><br>
@endif
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon fas fa-user-tag"></i>
            </div>
            <div>Role Table
                <div class="page-title-subheading">Containing some sort of information.</div>
            </div>
        </div>
    </div>
</div>
    <div class="card-body">
        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="example_length"><label>Show <select name="example_length"
                                aria-controls="example" class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries</label></div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="example_filter" class="dataTables_filter"><label>Search:<input type="search"
                                class="form-control form-control-sm" placeholder="" aria-controls="example"></label></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table style="width: 100%;" id="table_id"
                        class="table table-hover table-striped table-bordered dataTable dtr-inline" role="grid"
                        aria-describedby="example_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    style="width: 27.2px;" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">ID</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    style="width: 27.2px;" aria-label="Position: activate to sort column ascending">
                                    Name</th>

                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    style="width: 27.2px;" aria-label="Age: activate to sort column ascending">slug</th>
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                    style="width: 62.2px;" aria-label="Start date: activate to sort column ascending">Action
                                </th>

                            </tr>

                        </thead>
                        <tbody>

                            @foreach ($role as $role)
                                <tr role="row" class="odd">
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->slug }}</td>
                                    <td><a href="{{ route('roles.edit', $role->id) }}"><button type="button"
                                                class="btn btn-success">Edit</button></a>
                                        <a href="{{ route('roles.delete', $role->id) }}"><button type="button"
                                                class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- </tr> --}}
                        </tbody>
                        <tfoot>
                            {{-- <tr>
                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Position</th>
                                <th rowspan="1" colspan="1">Office</th>
                                <th rowspan="1" colspan="1">Age</th>
                                <th rowspan="1" colspan="1">Start date</th>
                                <th rowspan="1" colspan="1">Salary</th>
                            </tr> --}}
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 4 of 4
                        entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="example_previous"><a href="#"
                                    aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                            </li>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1"
                                    tabindex="0" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="2"
                                    tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="3"
                                    tabindex="0" class="page-link">3</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="4"
                                    tabindex="0" class="page-link">4</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="5"
                                    tabindex="0" class="page-link">5</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="6"
                                    tabindex="0" class="page-link">6</a></li>
                            <li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example"
                                    data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready( function () {
    $('#table_id').DataTable();
} );
    </script>
@endsection
