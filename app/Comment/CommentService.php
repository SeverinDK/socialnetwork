<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 26-09-2016
 * Time: 18:58
 */

namespace App\Comment;

use App\Gallery\GalleryRepository;
use App\Post\PostRepository;
use App\Profile\Profile;

class CommentService
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;
    /**
     * @var PostRepository
     */
    private $postRepository;
    /**
     * @var GalleryRepository
     */
    private $galleryRepository;


    /**
     * CommentService constructor.
     *
     * @param CommentRepository $commentRepository
     * @param PostRepository    $postRepository
     *
     * @param GalleryRepository $galleryRepository
     *
     * @internal param ModelService $modelService
     */
    public function __construct(CommentRepository $commentRepository, PostRepository $postRepository, GalleryRepository $galleryRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->postRepository    = $postRepository;
        $this->galleryRepository = $galleryRepository;
    }


    /**
     * @author Dennis Micky Jensen <dj@tattoodo.com>
     *
     * @param Profile $profile
     * @param int     $postId
     * @param string  $comment
     *
     * @return Comment|string
     */
    public function createPostComment(Profile $profile, int $postId, string $comment)
    {
        $comment = new Comment(['content' => $comment]);
        $post    = $this->postRepository->find($postId);
        $comment = $profile->comment($comment, $post);

        return $comment;

    }

    /**
     * @author Dennis Micky Jensen <dj@tattoodo.com>
     *
     * @param Profile $profile
     * @param int     $galleryId
     * @param string  $comment
     *
     * @return Comment|string
     */
    public function createGalleryComment(Profile $profile, int $galleryId, string $comment)
    {
        $comment = new Comment(['content' => $comment]);
        $post    = $this->galleryRepository->find($galleryId);
        $comment = $profile->comment($comment, $post);

        return $comment;

    }
}