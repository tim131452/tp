@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role & Permission
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('user-management/role') }}"><i class="fa fa-dashboard"></i> User Management</a></li>
        <li class="active">Role & Permission</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection