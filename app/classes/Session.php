<?php


namespace App\Classes;


use mysql_xdevapi\Exception;

/**
 * Create a session
 * Get value from session
 * Check is session exists
 * Remove session
 */

class Session
{

    /**
     * @param $name
     * @param $value
     * @return mixed
     * @throws \Exception
     */

    public static function add($name, $value)
    {
        if ($name != '' && !empty($name) && $value != '' && !empty($value)) {
            return $_SESSION[$name] = $value;
        }

        // If not provide anything than
        throw new \Exception('Name and value required!');
    }

    /**
     * @param $name
     * @return mixed
     */

    public static function get($name)
    {
        return $_SESSION[$name];
    }

    /**
     * @param $name
     * @return bool
     * @throws \Exception
     */

    public static function has($name)
    {
        if ($name != '' && !empty($name)) {
            return (isset($_SESSION[$name])) ? true : false;
        }

        throw new \Exception('Name is required!');
    }

    /**
     * @param $name
     * @throws \Exception
     */

    public static function remove($name)
    {
        if (self::has($name)) {
            unset($_SESSION[$name]);
        }
    }

    /**
     * Flash a message and unset old session
     * @param $name
     * @param $value
     * @return mixed|null
     * @throws \Exception
     */
    public static function flash($name, $value = '')
    {
        if (self::has($name)) {
            $old_value = self::get($name);

            self::remove($name);

            return $old_value;
        } else {
            self::add($name, $value);
        }

        return null;
    }


}