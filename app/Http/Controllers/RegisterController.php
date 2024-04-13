<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Repositories\EloquentUserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller
{    
    public function __construct(protected EloquentUserRepository $userRepository)
    {
    }

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

        $user = $this->userRepository->getByUsername($username);

        if ($user) {
            return redirect()->route('auth.register')->withErrors([
                'User with this username already exists.',
            ]);
        }

        $this->userRepository->create($validated);

        return redirect()->route('auth.register')->with('message-success', 'Registration successful.');
    }
}
