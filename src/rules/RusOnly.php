<?php

namespace app\validate\RusOnly;

use rock\validate\rules\Rule;

class RusOnly extends Rule
{
    public function validate($input)
    {
        return (bool)preg_match('/^[А-Яа-яёЁ\-\s]+$/u', $input);
    }
}
