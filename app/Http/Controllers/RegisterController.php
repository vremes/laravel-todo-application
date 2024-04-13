<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Controller that takes care of user registrations.
 */
class RegisterController extends Controller
{   
    /**
     * Renders registration view.
     *
     * @param Request $request
     * @return View
     */
    public function view(Request $request): View
    {
        return view('auth.register');
    }

    /**
     * Handles user registration.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function handle(UserRegistrationRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $username = $validated['name'];

        $user = User::where('name', $username)->first();

        if ($user) {
            return redirect()->route('auth.register')->withErrors([
                __('User with this username already exists.'),
            ]);
        }

        User::create($validated);

        return redirect()->route('auth.register')->with('message-success', __('Registration successful.'));
    }
}
