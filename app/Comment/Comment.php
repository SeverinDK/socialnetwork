<?php

namespace App\Comment;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'profile_id'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }
}
