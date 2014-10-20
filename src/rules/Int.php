<?php

namespace rock\validate\rules;


class Int extends Rule
{
    /**
     * @inheritdoc
     */
    public function validate($input)
    {
        return is_numeric($input) && (int)$input == $input;
    }
} 