<?php

namespace App\Http\Controllers;

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
        return view('home.index');
    }
}
