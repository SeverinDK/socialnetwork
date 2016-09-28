<?php
namespace App\Post;

use Rinvex\Repository\Repositories\EloquentRepository;

class PostRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.post';

    protected $model = 'App\Post\Post';
}