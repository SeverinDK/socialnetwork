<?php

namespace App\Http\Controllers;

use App\Post\PostService;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    /**
     * @var PostService
     */
    private $postService;

    /**
     * PostController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function post(Request $request)
    {
        $this->postService->createForActiveProfile($request->post);

        return redirect("/");
    }
}
