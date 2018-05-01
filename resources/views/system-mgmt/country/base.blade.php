@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Country Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('system-management/country') }}"><i class="fa fa-dashboard"></i> System Management</a></li>
        <li class="active">Country</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection