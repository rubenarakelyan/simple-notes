<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Comment;
use App\Note;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show notes overview.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notes = Note::with('user')->orderBy('updated_at', 'desc')->get();
        return view('home', ['notes' => $notes]);
    }

    /**
     * Show new note form.
     *
     * @return \Illuminate\Http\Response
     */
    public function newNote(Request $request)
    {
        return view('new');
    }

    /**
     * Save a note.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNote(Request $request)
    {
        if ($request->has('title') && $request->has('text'))
        {
            $note = Note::create(['title' => $request->input('title'), 'text' => $request->input('text'), 'user_id' => $request->user()->id]);
        }
        
        return redirect('/');
    }

    /**
     * Show note and associated comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewNote(Request $request, $note_id)
    {
        $note = Note::with('comments.user')->where('id', '=', $note_id)->first();
        return view('note', ['note' => $note]);
    }

    /**
     * Show new comment form.
     *
     * @return \Illuminate\Http\Response
     */
    public function newComment(Request $request, $note_id)
    {
        $note = Note::with('comments.user')->where('id', '=', $note_id)->first();
        return view('new-comment', ['note' => $note]);
    }

    /**
     * Save a comment.
     *
     * @return \Illuminate\Http\Response
     */
    public function createComment(Request $request, $note_id)
    {
        if ($request->has('text'))
        {
            $comment = Comment::create(['text' => $request->input('text'), 'note_id' => $note_id, 'user_id' => $request->user()->id]);
        }
        
        return redirect('/note/'.$note_id);
    }
}
