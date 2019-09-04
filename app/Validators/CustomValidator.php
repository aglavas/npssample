<?php

namespace App\Validators;

class CustomValidator
{
    /**
     * Hashing salt
     */
    const STATIC_SALT = '6Sqf4sS7mJXiPqVkKjNX';

    /**
     * Check hash integrity
     *
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameters
     * @return bool
     */
    public function checkHashIntegrity($message, $attribute, $rule, $parameters)
    {
        $createdHash = md5($rule[0] . $rule[1] . self::STATIC_SALT);

        if ($createdHash === $attribute) {
            return true;
        }

        return false;
    }

    /**
     *
     * Replacer for custom message
     *
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameters
     * @return string
     */
    public function checkHashIntegrityReplacer($message, $attribute, $rule, $parameters)
    {
        $message = "Hash integrity error.";

        return $message;
    }

}
