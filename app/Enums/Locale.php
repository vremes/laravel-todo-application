<?php

namespace App\Enums;


enum Locale: string
{
    case ENGLISH = 'en';

    /**
     * Returns true if given locale string is valid.
     *
     * @param string|null $locale
     * @return boolean
     */
    public static function isValid(?string $locale): bool
    {
        $localeToEnum = static::tryFrom($locale);
        if ($localeToEnum === null) {
            return false;
        }
        $allLocales = self::cases();
        return in_array($localeToEnum, $allLocales, true);
    }
}
