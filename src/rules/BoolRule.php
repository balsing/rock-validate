<?php

namespace rock\validate\rules;


class BoolRule extends Rule
{
    public $skipEmpty = false;
    /**
     * @inheritdoc
     */
    public function validate($input)
    {
    	if($input=="")
    		$input = false;

        return is_bool($input);
    }
} 