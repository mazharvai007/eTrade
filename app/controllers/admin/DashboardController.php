<?php


namespace App\Controllers\Admin;


use App\Classes\Request;
use App\Classes\Session;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function show()
    {
        Session::add('admin', 'You are welcome, admin user');
        Session::remove('admin');

        if (Session::has('admin')) {
            $msg = Session::get('admin');
        } else {
            $msg = 'Not defined';
        }

        return view('admin/dashboard', ['admin' => $msg]);
    }

    public function get()
    {
        $request = Request::get('file');
        var_dump($request->image->name);
    }
}