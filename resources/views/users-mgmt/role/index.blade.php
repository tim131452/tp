@extends('users-mgmt.role.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of roles</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('role.create') }}">Add new role</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('role.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-search-row', ['items' => ['Role Code', 'Role Name'],
          'oldVals' => [isset($searchingVals) ? $searchingVals['role_code'] : '', isset($searchingVals) ? $searchingVals['name'] : '']])
          @endcomponent
        @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="role: activate to sort column ascending">Role Code</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="role: activate to sort column ascending">Role Name</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
                <tr role="row" class="odd">
                  <td>{{ $role->role_code }}</td>
                  <td>{{ $role->name }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('role.destroy', ['id' => $role->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('role.edit', ['id' => $role->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                        Update
                        </a>
                        <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          Delete
                        </button>
                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="role: activate to sort column ascending">Role Code</th>
                <th width="20%" rowspan="1" colspan="1">Role Name</th>
                <th rowspan="1" colspan="2">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($roles)}} of {{count($roles)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $roles->links() }}
          </div>
        </div>
      </div>


        <br/><br/>
      <div class="text-justify"><strong><h4>Access Permissions for Roles</h4></strong></div>
      <table class="table table-bordered table-hover dataTable">
          <thead>
          <tr>
              <th>Role Code</th>
              <th>Permission Description</th>
          </tr>
          </thead>
          <tbody>
          <tr>
              <td>ADMIN</td>
              <td>Full System Access</td>
          </tr>
          <tr>
              <td>HOD</td>
              <td>Employee Setup, Client, Department, Organization, Reporting</td>
          </tr>
          <tr>
              <td>TL</td>
              <td>Project Setup, Timesheet Submission</td>
          </tr>
          <tr>
              <td>TS</td>
              <td>Timesheet Submission Only</td>
          </tr>
          <tr>
              <td>TV</td>
              <td>Timesheet Verification Only</td>
          </tr>
          <tr>
              <td>TMG</td>
              <td>Timesheet Submission & Reporting</td>
          </tr>
          </tbody>
      </table>


    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection