@extends('system-mgmt.client.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new client</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('client.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('client_name') ? ' has-error' : '' }}">
                            <label for="client_name" class="col-md-4 control-label">Client Name</label>

                            <div class="col-md-6">
                                <input id="client_name" type="text" class="form-control" name="client_name" value="{{ old('client_name') }}" required autofocus>

                                @if ($errors->has('client_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('client_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('client_code') ? ' has-error' : '' }}">
                            <label for="client_code" class="col-md-4 control-label">Client Code</label>

                            <div class="col-md-6">
                                <input id="client_code" type="text" class="form-control" name="client_code" value="{{ old('client_code') }}" required>
                                @if ($errors->has('client_code'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('client_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('client_desc') ? ' has-error' : '' }}">
                            <label for="client_desc" class="col-md-4 control-label">Client Description</label>

                            <div class="col-md-6">
                                <input id="client_desc" type="text" class="form-control" name="client_desc" value="{{ old('client_desc') }}" required>
                                @if ($errors->has('client_desc'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('client_desc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
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
