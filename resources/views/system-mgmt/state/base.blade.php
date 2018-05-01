@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        State Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('system-management/state') }}"><i class="fa fa-dashboard"></i> System Management</a></li>
        <li class="active">State</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection