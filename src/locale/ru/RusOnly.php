<?php

namespace rock\validate\locale\ru;


use rock\validate\locale\Locale;

class RusOnly extends Locale
{
    public function defaultTemplates()
    {
        return [
            self::MODE_DEFAULT => [
                self::STANDARD => 'Поле должно содержать только символы русского алфавита',
            ],
            self::MODE_NEGATIVE => [
                self::STANDARD => 'Поле должно содержать только символы русского алфавита',
            ]
        ];
    }
}

