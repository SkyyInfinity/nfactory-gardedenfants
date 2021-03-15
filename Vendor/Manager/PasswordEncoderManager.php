<?php

namespace Vendor\Manager;

class PasswordEncoderManager
{
    /**
     * Encode password
     *
     * @param string $password
     * @return string
     */
    public function passwordEncode($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Compare password
     *
     * @param string $password
     * @param string $userPassword
     * @return boolean
     */
    public function passwordVerify($password, $userPassword)
    {
        return password_verify($password, $userPassword);
    }
}