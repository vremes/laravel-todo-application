<?php

namespace App\Enums;


enum Locale: string
{
    case ENGLISH = 'en';
    case FINNISH = 'fi';

    /**
     * Returns true if given locale string is valid.
     *
     * @param string|null $locale
     * @param array $validLocales
     * @return boolean
     */
    public static function isValid(?string $locale, array $validLocales = [Locale::ENGLISH->value, Locale::FINNISH->value]): bool
    {
        $localeToEnum = static::tryFrom($locale);
        if ($localeToEnum === null) {
            return false;
        }
        return in_array($localeToEnum, $validLocales, true);
    }

    /**
     * Returns validated locale.
     *
     * @param string|null $locale The locale to validate.
     * @param string $default The default locale to return if validation fails.
     * @param array $validLocales An array of valid locales.
     * @return string
     */
    public static function getValidatedLocale(?string $locale, string $default = Locale::ENGLISH->value, array $validLocales = [Locale::ENGLISH->value, Locale::FINNISH->value]): string
    {
        $localeToEnum = static::tryFrom($locale);

        if ($localeToEnum === null) {
            return $default;
        }

        if (self::isValid($locale, $validLocales)) {
            return $default;
        }

        return $locale;
    }
}
