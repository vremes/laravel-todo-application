<?php

namespace App\Http\Controllers;

use App\Repositories\EloquentUserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Controller that takes care of user logins.
 */
class LoginController extends Controller
{
    public function __construct(protected EloquentUserRepository $userRepository)
    {
    }

    /**
     * Renders login page.
     *
     * @param Request $request
     * @return View
     */
    public function view(Request $request): View
    {
        return view('auth.login');
    }

    /**
     * Handles login requests.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function handle(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials) === false) {
            return redirect()->back()->withErrors([
                'Invalid username or password.',
            ]);
        }

        $request->session()->regenerate();
 
        return redirect()->route('user_home.index');
    }
}
