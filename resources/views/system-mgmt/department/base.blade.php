@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Department Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('system-management/department') }}"><i class="fa fa-dashboard"></i> System Management</a></li>
        <li class="active">Department</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection