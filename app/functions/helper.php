<?php

use Philo\Blade\Blade;
use voku\helper\Paginator;
use Illuminate\Database\Capsule\Manager as Capsule;

/*
 * Display view using Laravel Blade Engine
 */
function view($path, $data = [])
{
    $view = __DIR__ . '/../../resources/views/';
    $cache = __DIR__ . '/../../bootstrap/cache';

    $blade = new Blade($view, $cache);

    echo $blade->view()->make($path, $data)->render();
}

/*
 * Mail Sending system
 * It's going to two arguments
 * FileName = It's going to be the templates
 * Data = Array of data
 */
function make($filename, $data)
{

    // Extract Data
    extract($data);

    // Turn on output buffering
    ob_start();

    // Include template
    include(__DIR__ . '/../../resources/views/emails/' . $filename . '.php');

    // Get content of the file
    $content = ob_get_contents();

    // Erage the output and turn off output buffering
    ob_end_clean();

    return $content;
}

/**
 * @param $value
 * @return string
 */

function slug($value)
{
    // Remove all characters not in this list: underscore | letters | numbers | whitespace
    $value = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u', '',mb_strtolower($value));

    // Replace underscore with a hash
    $value = preg_replace('!['.preg_quote('-').'\s]+!u', '- ',$value);

    // Remove Whitespace
    return trim($value, '-');


}

/**
 * @param $number_of_records
 * @param $total_record
 * @param $table_name
 * @param $object
 * @return array
 */

function paginate($number_of_records, $total_record, $table_name, $object)
{

    $pages = new Paginator($number_of_records, 'p');
    $pages->set_total($total_record);

    $data = Capsule::select("SELECT * FROM $table_name WHERE deleted_at IS NULL ORDER BY created_at DESC" . $pages->get_limit());
    $categories = $object->transform($data);

    return [$categories, $pages->page_links()];
}