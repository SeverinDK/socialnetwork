<?php

namespace App\User;

use App\Profile\ProfileService;
use App\User\UserRegisteredEvent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class UserRegisteredListener
{
    /**
     * @var ProfileService
     */
    private $profileService;

    /**
     * Create the event listener.
     *
     * @param ProfileService $profileService
     */
    public function __construct(ProfileService $profileService)
    {
        //
        $this->profileService = $profileService;
    }

    /**
     * Handle the event.
     *
     * @param  UserRegisteredEvent $event
     * @return void
     */
    public function handle(Registered $event)
    {
        /*$fullname = explode(' ', $event->user->name);
        $this->profileService->create($fullname[0], $fullname[1]);*/
    }
}
