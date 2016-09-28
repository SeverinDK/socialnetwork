<?php
namespace App\Comment;

use Rinvex\Repository\Repositories\EloquentRepository;

class CommentRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.comment';

    protected $model = 'App\Comment\Comment';


}