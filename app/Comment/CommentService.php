<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 26-09-2016
 * Time: 18:58
 */

namespace App\Comment;


use App\Post\Post;

class CommentService
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * CommentService constructor.
     * @param CommentRepository $commentRepository
     * @param ModelService $modelService
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param $content
     * @param $profileId
     */
    public function createForModelTypeById($modelType, $modelId, $content, $profileId)
    {
        if($modelType == "post") {
            //$model =
        }
        return Comment::createFromAttributes(['content' => $content, 'profile_id' => $profileId, 'model' => $model]);
    }
}