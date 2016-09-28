<?php

namespace App\Http\Controllers;

use App\Comment\CommentService;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
    /**
     * @var CommentService
     */
    private $commentService;

    /**
     * CommentController constructor.
     * @param CommentService $commentService
     */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function post(Request $request, $modelType, $modelId)
    {
        $this->commentService->createForModelTypeById($modelType, $modelId, $request->comment, Auth::user()->profile_id);
    }
    
    
    public function postCreatePostComment(Request $request, $postId) 
    {
        $comment = $this->commentService->createPostComment(Auth::user()->profile(), $postId, $request->get('comment')); 
    }

    public function postCreateGalleryComment(Request $request, $galleryId) 
    {
        $comment = $this->commentService->createGalleryComment(Auth::user()->profile(), $galleryId, $request->get('comment'));
    }
}
