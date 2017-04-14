<?php


namespace rock\validate\rules;

class Snils extends Rule
{
    public function validate($input)
    {
        $value = substr($input, 0, 9);
        $check = substr($input, -2);
        $value = str_split($value);

        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += $value[$i] * (9 - $i);
        }
        if ($sum < 100 && $sum == $check) {
            return true;
        } else {
            if (($sum == 100 || $sum == 101) && $check == 0) {
                return true;
            } else {
                if ($sum > 101 && ($sum % 101 == $check || ($sum % 101 == 100 && $check == 0))) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
}
