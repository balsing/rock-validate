<?php


namespace rock\validate\rules;

class RusOnly extends Rule
{
    public function validate($input)
    {
        return (bool)preg_match('/^[А-Яа-яёЁ\-\s]+$/u', $input);
    }
}
