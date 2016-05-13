@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{ $note->title }}</h2>
            <p>{{ $note->text }}</p>
            <form action="/note/{{ $note->id }}/comment" method="post">
                <div class="form-group">
                    <textarea name="text" class="form-control" rows="6"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a href="/note/{{ $note->id }}" class="btn btn-default btn-raised">Cancel</a>
                    <button type="submit" class="btn btn-success btn-raised pull-right">Add note <span class="glyphicon glyphicon-chevron-right"></span></button>
                </div>
            </form>
            <hr />
            @foreach ($note->comments as $comment)
            <div class="row">
                <div class="col-md-1">
                    <img src="https://secure.gravatar.com/avatar/{{ md5(strtolower(trim($comment->user->email))) }}?d=identicon&amp;s=40" width="40" height="40" alt="" class="icon">
                </div>
                <div class="col-md-11">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p><strong>{{ $comment->user->name }}</strong><strong class="pull-right">{{ (new \Carbon\Carbon($comment->updated_at))->format('d/m/y H:i') }}</strong></p>
                            <p>{{ $comment->text }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
