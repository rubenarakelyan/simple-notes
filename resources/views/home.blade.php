@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Notes overview <small class="pull-right"><a href="/logout">Logout</a></small></h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover" id="notes">
                        <thead>
                            <tr>
                                <th>Created by</th>
                                <th>Title</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($notes) === 0)
                            <tr>
                                <td colspan="3">There are no notes to display.</td>
                            </tr>
                            @else
                            @foreach ($notes as $note)
                            <tr>
                                <td>{{ $note->user->name }}</td>
                                <td><a href="/note/{{ $note->id }}">{{ $note->title }}</a></td>
                                <td>{{ (new \Carbon\Carbon($note->updated_at))->format('d/m/y H:i') }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <a href="/new" class="btn btn-success btn-raised">Create a new note <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
        </div>
    </div>
@endsection
