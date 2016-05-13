@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>New note</h2>
            <form action="/new" method="post">
                <div class="form-group">
                    <label for="title">Title: <span class="form-required">*</span></label>
                    <input type="text" name="title" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="text">Note: <span class="form-required">*</span></label>
                    <textarea name="text" class="form-control" rows="6" id="text"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a href="/" class="btn btn-default btn-raised">Cancel</a>
                    <button type="submit" class="btn btn-success btn-raised pull-right">Add note <span class="glyphicon glyphicon-chevron-right"></span></button>
                </div>
            </form>
        </div>
    </div>
@endsection
