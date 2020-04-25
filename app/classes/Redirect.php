<?php


namespace App\Classes;

/**
 * Class Redirect
 * @package App\Classes
 * It's accept two methods
 * 1. Redirect to specific page
 * 2. Redirect to same page
 */

class Redirect
{
    /**
     * @param $page
     */
    public static function to($page)
    {
        header("location: $page");
    }

    /**
     * Redirect to same page
     */

    public static function back()
    {
        $uri = $_SERVER['REQUEST_URI'];

        header("location: $uri");
    }
}