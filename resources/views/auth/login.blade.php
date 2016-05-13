@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Login</h2>
            <form action="/login" method="post">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="username">Username: <span class="form-required">*</span></label>
                    <input type="email" name="email" class="form-control" id="username">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Password: <span class="form-required">*</span></label>
                    <input type="password" name="password" class="form-control" id="password">
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-success btn-raised">Login <span class="glyphicon glyphicon-chevron-right"></span></button>
                </div>
            </form>
        </div>
    </div>
@endsection
