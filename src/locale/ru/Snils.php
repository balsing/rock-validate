<?php

namespace rock\validate\locale\ru;


use rock\validate\locale\Locale;

class Snils extends Locale
{
    public function defaultTemplates()
    {
        return [
            self::MODE_DEFAULT => [
                self::STANDARD => 'Номер СНИЛС введён с ошибкой',
            ],
            self::MODE_NEGATIVE => [
                self::STANDARD => 'Номер СНИЛС введён с ошибкой',
            ]
        ];
    }
}