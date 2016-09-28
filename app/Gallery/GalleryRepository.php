<?php
namespace App\Gallery;

use Rinvex\Repository\Repositories\EloquentRepository;

class GalleryRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.gallery';

    protected $model = 'App\Gallery\Gallery';
}