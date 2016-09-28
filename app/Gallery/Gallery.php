<?php

namespace App\Gallery;

use App\Comment\Comment;
use App\Media\Media;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'public',
    ];

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function galleryable()
    {
        return $this->morphTo();
    }
}
