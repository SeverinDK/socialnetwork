<?php

namespace App\Http\Controllers;

use App\Profile\ProfileService;
use App\User\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class ProfileController extends Controller
{
    /**
     * @var ProfileService
     */
    private $profileService;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * ProfileController constructor.
     * @param ProfileService $profileService
     * @param UserService $userService
     */
    public function __construct(ProfileService $profileService, UserService $userService)
    {

        $this->profileService = $profileService;
        $this->userService = $userService;
    }

    public function setActiveProfile($id)
    {
        $this->userService->setActiveProfile(Auth::id(), $id);
        return redirect('/');
    }

    public function create()
    {
        return view('profile.create');
    }

    public function post(Request $request)
    {
        list($day, $month, $year) = explode('/', $request->dateOfBirth);
        $dateOfBirth = Carbon::createFromDate($year, $month, $day);
        $fullname = explode(' ', $request->name);
        $nickname = $request->nickname;

        $this->profileService->create(Auth::user()->id, $fullname[0], $fullname[1], $nickname, $dateOfBirth);

        return redirect('/');
    }
}
