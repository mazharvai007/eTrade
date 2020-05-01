<?php


namespace App\Classes;


use Illuminate\Database\Capsule\Manager as Capsule;

class ValidateRequest
{
    /**
     * Check unique value
     * @param $column
     * @param $value
     * @param $policy
     * @return bool
     */
    protected static function unique($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return !Capsule::table($policy)->where($column, '=', $value)->exists();
        }

        return true;
    }

    /**
     * Check empty field
     * @param $column
     * @param $value
     * @param $policy
     * @return bool
     */
    public static function required($column, $value, $policy)
    {
        return $value !== null && !empty(trim($value));
    }

    /**
     * Check min length
     * @param $column
     * @param $value
     * @param $policy
     * @return bool
     */
    public static function minLength($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return strlen($value) >= $policy;
        }

        return true;
    }

    /**
     * Check max length
     * @param $column
     * @param $value
     * @param $policy
     * @return bool
     */
    public static function maxLength($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return strlen($value) <= $policy;
        }

        return true;
    }
}