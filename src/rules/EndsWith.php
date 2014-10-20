<?php

namespace rock\validate\rules;

class EndsWith extends Rule
{
    public function __construct($endValue, $identical = false, $config = [])
    {
        $this->parentConstruct($config);
        $this->params['endValue'] = $endValue;
        $this->params['identical'] = $identical;
    }

    /**
     * @inheritdoc
     */
    public function validate($input)
    {
        if ($this->params['identical'] ) {
            return $this->validateIdentical($input);
        }
        return $this->validateEquals($input);
    }

    protected function validateEquals($input)
    {
        if (is_array($input)) {
            return end($input) == $this->params['endValue'];
        } else {
            return mb_strripos($input, $this->params['endValue'], -1, $enc = mb_detect_encoding($input))
                   === mb_strlen($input, $enc) - mb_strlen($this->params['endValue'], $enc) ;
        }
    }

    protected function validateIdentical($input)
    {
        if (is_array($input)) {
            return end($input) === $this->params['endValue'];
        } else {
            return mb_strrpos($input, $this->params['endValue'], 0, $enc = mb_detect_encoding($input))
                   === mb_strlen($input, $enc) - mb_strlen($this->params['endValue'], $enc);
        }
    }
}