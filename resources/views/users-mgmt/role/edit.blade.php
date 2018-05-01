@extends('users-mgmt.role.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update role</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('role.update', ['id' => $role->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Role Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $role->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role_code" class="col-md-4 control-label">Role Code</label>

                            <div class="col-md-6">
                                <select class="form-control" name="role_code" required>
                                    <option selected>Select Role</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="HOD">HOD</option>
                                    <option value="TL">TL</option>
                                    <option value="TS">TS</option>
                                    <option value="TV">TV</option>
                                    <option value="TMG">TMG</option>
                                </select>
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
