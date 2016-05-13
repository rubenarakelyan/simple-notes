<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'note_id', 'user_id',
    ];

    /**
     * Get the note record associated with the comment.
     *
     * @var object
     */
    public function note() {
        return $this->belongsTo('App\Note');
    }

    /**
     * Get the user record associated with the comment.
     *
     * @var object
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
}
