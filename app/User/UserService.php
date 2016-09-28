<?php
/**
 * Created by PhpStorm.
 * User: Severin
 * Date: 26-09-2016
 * Time: 18:58
 */

namespace App\User;


class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $userId
     */
    public function setActiveProfile($userId, $profileId)
    {
        return $this->userRepository->update($userId, ['profile_id' => $profileId])[1];
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getActiveProfile($userId)
    {
        return $this->userRepository->find($userId)->profile_id;
    }
}