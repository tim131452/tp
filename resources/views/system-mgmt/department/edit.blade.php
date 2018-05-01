@extends('system-mgmt.department.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update department</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('department.update', ['id' => $department->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Department Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $department->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dept_head') ? ' has-error' : '' }}">
                            <label for="dept_head" class="col-md-4 control-label">Department Head</label>

                            <div class="col-md-6">
                                <input id="dept_head" type="text" class="form-control" name="dept_head" value="{{ $department->dept_head }}" required autofocus>

                                @if ($errors->has('dept_head'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('dept_head') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection