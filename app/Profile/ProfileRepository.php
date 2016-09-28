<?php
namespace App\Profile;

use Rinvex\Repository\Repositories\EloquentRepository;

class ProfileRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.profile';

    protected $model = 'App\Profile\Profile';
}