<?php


namespace App\Classes;

/**
 * Class Request
 * Check request availability
 * Get request data
 * Refresh method (Clear/Request)
 *
 * @package App\Classes
 */
class Request
{
    /**
     * Return all request that we are interested in
     * @param bool $is_array
     * @return mixed
     */
    public static function all($is_array = false)
    {
        $result = [];

        if (count($_GET) > 0) $result['get'] = $_GET;
        if (count($_POST) > 0) $result['post'] = $_POST;

        $result['file'] = $_FILES;

        return json_decode(json_encode($result), $is_array);
    }

    /**
     * Get specific request type
     * @param $key
     * @return mixed
     */

    public static function get($key)
    {
        $obj = new static();
        $data = $obj->all();

        return $data->$key;
    }
}