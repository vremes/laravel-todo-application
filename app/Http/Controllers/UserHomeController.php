<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Controller for authenticated user home page.
 */
class UserHomeController extends Controller
{
    /**
     * Renders the home page for user.
     *
     * @return void
     */
    public function index(Request $request): View
    {
        $userId = auth()->id();

        $todos = Todo::where("user_id", $userId)->orderBy('created_at', 'desc')->get();

        return view('home.index', [
            'todos' => $todos,
        ]);
    }
}
