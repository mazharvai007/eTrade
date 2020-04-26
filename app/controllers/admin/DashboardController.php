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
        Request::refresh();
        $data = Request::old('post', 'product');
        var_dump($data); exit();

        /*if (Request::has('post')) {
            $request = Request::get('post');
            var_dump($request->product);
        } else {
            var_dump('Posting Does not exists');
        }*/

    }
}