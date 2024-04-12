<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistrationRequest;
use App\Repositories\EloquentUserRepository;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

final class AuthController extends Controller
{
    public function __construct(protected EloquentUserRepository $userRepository)
    {
    }

    public function showUserRegistration(Request $request)
    {
        return view('auth.registration');
    }
}