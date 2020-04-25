<?php


namespace App\Controllers\Admin;


use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function show()
    {
        return view('admin/dashboard');
    }
}