<?php


namespace App\Classes;

/**
 * Class CSRFToken
 * @package App\Classes
 * It's contain two methods
 * 1. Generate Token
 * 2. Verify Token
 */

class CSRFToken
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public static function _token()
    {
        if (!Session::has('token')) {
            $randomToken = base64_encode(openssl_random_pseudo_bytes(32));

            Session::add('token', $randomToken);

        }

        return Session::get('token');
    }

    /**
     * @param $requestToken
     * @return bool
     * @throws \Exception
     */

    public static function verifyCSRFToken($requestToken)
    {
        if (Session::has('token') && Session::get('token') === $requestToken) {
            Session::remove('token');
            return true;
        }

        return false;
    }
}