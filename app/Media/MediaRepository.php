<?php
namespace App\Media;

use Rinvex\Repository\Repositories\EloquentRepository;

class MediaRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.media';

    protected $model = 'App\Media\Media';
}