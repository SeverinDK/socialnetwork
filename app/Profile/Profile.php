<?php

namespace App\Profile;

use App\Comment\Comment;
use App\Gallery\Gallery;
use App\Post\Post;
use App\User\User;
use Hootlex\Friendships\Traits\Friendable;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'profile_details_id',
        'avatar_gallery_id',
        'coverphoto_gallery_id',
        'online',
        'active',
        'public',
    ];

    /**
     * @param array $profileAttributes
     * @param array $detailAttributes
     * @return Profile
     */
    public static function createFromAttributes(array $profileAttributes, array $detailAttributes)
    {
        $profile = Profile::create($profileAttributes);
        $detailAttributes['profile_id'] = $profile->id;

        $profileDetails = ProfileDetails::create($detailAttributes);
        $avatarGallery = Gallery::create(config('galleries.avatar_gallery'));
        $coverphotoGallery = Gallery::create(config('galleries.coverphoto_gallery'));

        $profile->update([
            'profile_details_id' => $profileDetails->id,
            'avatar_gallery_id' => $avatarGallery->id,
            'coverphoto_gallery_id' => $coverphotoGallery->id
        ]);

        $profile->profileDetails()->save($profileDetails);
        $profile->galleries()->save($avatarGallery);
        $profile->galleries()->save($coverphotoGallery);

        return $profile;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profileDetails()
    {
        return $this->hasOne(ProfileDetails::class);
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function galleries()
    {
        return $this->morphMany(Gallery::class, 'galleryable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getFullName()
    {
        return $this->profileDetails->firstname . ' ' . $this->profileDetails->lastname;
    }


    /**
     * @author Dennis Micky Jensen <dj@tattoodo.com>
     *
     * @param Comment $comment
     * @param Model   $commentable
     *
     * @return Comment
     */
    public function comment(Comment $comment, Model $commentable)
    {
        $this->comments()->save($comment);
        $commentable->save($comment);
        return $comment;
    }
}
