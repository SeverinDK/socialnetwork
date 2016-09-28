<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 26-09-2016
 * Time: 18:58
 */

namespace App\Gallery;


class GalleryService
{
    /**
     * @var GalleryRepository
     */
    private $galleryRepository;

    /**
     * GalleryService constructor.
     * @param GalleryRepository $galleryRepository
     */
    public function __construct(GalleryRepository $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    public function create(Array $attributes)
    {
        return $this->galleryRepository->create($attributes)[1];
    }
}