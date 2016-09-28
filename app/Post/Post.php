<?php

namespace App\Post;

use App\Comment\Comment;
use App\Gallery\Gallery;
use App\Profile\Profile;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'public',
        'profile_id'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function galleries()
    {
        return $this->hasOne(Gallery::class, 'galleryable');
    }
}
