<?php


namespace App\Controllers\Admin;


use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;
use App\Models\Category;

class ProductCategoryController
{
    public function show()
    {
        $categories = Category::all();

        return view('admin/products/categories', compact('categories'));

    }

    public function store()
    {
        if (Request::has('post')) {
            $request = Request::get('post');
            $data = ValidateRequest::maxLength('name', $request->name, 3);

            if ($data) {
                echo 'All good.'; exit();
            } else {
                echo 'Max length is 3'; exit();
            }

            if (CSRFToken::verifyCSRFToken($request->token)) {
                // Process form data
                Category::create([
                    'name' => $request->name,
                    'slug' => slug($request->name)
                ]);

                $categories = Category::all();
                $message = 'Category Created';

                return view('admin/products/categories', compact('categories', 'message'));
            }

            throw new \Exception('Token mismatch');
        }

        return null;
    }

}