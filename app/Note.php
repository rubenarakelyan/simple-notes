<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'text', 'user_id',
    ];

    /**
     * Get the comment records associated with the note.
     *
     * @var object
     */
    public function comments() {
        return $this->hasMany('App\Comment')->orderBy('updated_at', 'desc');
    }

    /**
     * Get the user record associated with the note.
     *
     * @var object
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
}
