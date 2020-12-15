<?php

namespace rock\validate\rules;


class ObjectValue extends Rule
{
    public $skipEmpty = false;
    /**
     * @inheritdoc
     */
    public function validate($input)
    {
        return is_object($input);
    }
} 