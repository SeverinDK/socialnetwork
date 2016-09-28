<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 26-09-2016
 * Time: 18:58
 */

namespace App\Profile;

use App\Gallery\GalleryService;
use App\User\User;
use App\User\UserService;
use Auth;

class ProfileService
{
    /**
     * @var ProfileRepository
     */
    private $profileRepository;
    /**
     * @var ProfileDetails
     */
    private $profileDetails;
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var GalleryService
     */
    private $galleryService;

    /**
     * ProfileService constructor.
     * @param UserService $userService
     * @param ProfileRepository $profileRepository
     * @param ProfileDetails $profileDetails
     * @param GalleryService $galleryService
     */
    public function __construct(UserService $userService, ProfileRepository $profileRepository, ProfileDetails $profileDetails, GalleryService $galleryService)
    {
        $this->profileRepository = $profileRepository;
        $this->profileDetails = $profileDetails;
        $this->galleryService = $galleryService;
        $this->userService = $userService;
    }

    public function findAll()
    {
        return $this->profileRepository->findAll();
    }

    public function find($id)
    {
        return $this->profileRepository->find($id);
    }

    /**
     * @param $firstname
     * @param $lastname
     * @param null $nickname
     * @param null $dateOfBirth
     * @return Profile
     */
    public function create($userId, $firstname, $lastname, $nickname = null, $dateOfBirth = null)
    {
        $profile = Profile::createFromAttributes(
            [
                'user_id' => $userId,
                'online' => true,
                'active' => true,
                'public' => true
            ],
            [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'nickname' => $nickname,
                'date_of_birth' => $dateOfBirth
            ]
        );

        $this->userService->setActiveProfile($userId, $profile->id);

        return $profile;
    }
}
