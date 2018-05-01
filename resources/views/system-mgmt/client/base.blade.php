@extends('layouts.app-template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Client Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('system-management/client') }}"><i class="fa fa-dashboard"></i> System Mangement</a></li>
            <li class="active">Client</li>
        </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
</div>
@endsection