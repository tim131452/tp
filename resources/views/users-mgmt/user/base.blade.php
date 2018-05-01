@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Setup
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('user-management/user') }}"><i class="fa fa-dashboard"></i>User Management</a></li>
        <li class="active">User Setup</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection