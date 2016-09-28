<?php

namespace App\Http\Controllers;

use App\Profile\Profile;
use App\Profile\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * @var ProfileService
     */
    private $profileService;

    /**
     * Create a new controller instance.
     *
     * @param ProfileService $profileService
     */
    public function __construct(ProfileService $profileService)
    {
        $this->middleware('auth');
        $this->profileService = $profileService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with(['user' => Auth::user(), 'profiles' => Profile::with('profileDetails')->get()]);
    }
}
