<?php

namespace App\Http\Controllers;

use Hash;
use Session;

use App\Services\UserService;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginUserRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function index()
    {
        return view('user.login');
    }

    public function Login(LoginUserRequest $request)
    {

        $validated = $request->validated();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('frontend')
                ->withSuccess('Signed in');

        }

        return redirect("login")->withErrors('Login details are not valid');

    }

    public function frontend(){
        return view('frontend');
    }


    public function create()
    {
        return view('user.registration');
    }

    public function store(StoreUserRequest $request)
    {

        $newUser = $this->userService->create($request->validated());


        return redirect("/login");
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('frontend');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
