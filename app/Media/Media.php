<?php

namespace App\Media;

use App\Comment\Comment;
use App\Gallery\Gallery;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'path',
        'type',
        'public',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
