<?php

namespace App;

class Note
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'text', 'user_id',
    ];
}
