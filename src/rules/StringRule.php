<?php

namespace rock\validate\rules;


class StringRule extends Rule
{
    public $skipEmpty = true;
    /**
     * @inheritdoc
     */
    public function validate($input)
    {
        return is_string($input);
    }
} 