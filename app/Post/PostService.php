<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 26-09-2016
 * Time: 18:58
 */

namespace App\Post;


use App\Profile\ProfileService;
use Auth;
use Illuminate\Database\Eloquent\Model;

class PostService
{
    /**
     * @var PostRepository
     */
    private $postRepository;
    /**
     * @var ProfileService
     */
    private $profileService;

    /**
     * PostService constructor.
     * @param PostRepository $postRepository
     * @param ProfileService $profileService
     */
    public function __construct(PostRepository $postRepository, ProfileService $profileService)
    {

        $this->postRepository = $postRepository;
        $this->profileService = $profileService;
    }

    public function createForActiveProfile($content, $public = true)
    {
        return Post::create(['content' => $content, 'profile_id' => Auth::user()->profile_id, 'public' => $public]);
    }
}