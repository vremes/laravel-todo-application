<?php

namespace App\Http\Controllers;

use App\Enums\Locale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * Handles locale setting for the application.
     *
     * @param Request $request
     * @param string|null $locale
     * @return RedirectResponse
     */
    public function set(Request $request, ?string $locale = null): RedirectResponse
    {
        $validatedLocale = Locale::getValidatedLocale($locale);

        $localeCookie = cookie()->forever('locale', $validatedLocale);

        return redirect()->back()->cookie($localeCookie);
    }
}
