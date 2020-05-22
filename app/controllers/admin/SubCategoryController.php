<?php


namespace App\Controllers\Admin;


use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends BaseController
{

    /**
     * Store SubCategories into Database
     * @return void|null
     * @throws \Exception
     */

    public function store()
    {
        if (Request::has('post')) {
            $request = Request::get('post');
            $extra_errors = [];


            if (CSRFToken::verifyCSRFToken($request->token, false)) {
                $rules = [
                    'name' => [
                        'required' => true,
                        'minLength' => 4,
                        'string' => true
                    ],
                    'category_id' => ['required' => true]
                ];

                $validate = new ValidateRequest();
                $validate->abide($_POST, $rules);

                // Check subcategory exists or not
                $duplicate_subcategory = SubCategory::where('name', $request->name)->where('category_id', $request->category_id)->exists();

                if ($duplicate_subcategory) {
                    $extra_errors['name'] = array('Subcategory already exists.');
                }

                // Check product category exist or not
                $category = Category::where('id', $request->category_id)->exists();

                if (!$category) {
                    $extra_errors['name'] = array('Invalid product category.');
                }

                // Error validation
                if ($validate->hasError() || $duplicate_subcategory || !$category) {
                    $errors = $validate->getErrorMessages();
                    count($extra_errors) ? $response = array_merge($errors, $extra_errors) : $response = $errors;

                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);

                    echo json_encode($response);
                    exit();
                }

                // Process form data
                SubCategory::create([
                    'name' => $request->name,
                    'category_id' => $request->category_id,
                    'slug' => slug($request->name)
                ]);

                echo json_encode(['success' => 'Subcategory create successfully.']);
                exit();
            }

            throw new \Exception('Token mismatch');
        }

        return null;
    }

    /**
     * Edit/Update SubCategory
     * @param $id
     * @return null
     * @throws \Exception
     */

    public function edit($id)
    {
        if (Request::has('post')) {
            $request = Request::get('post');
            $extra_errors = [];


            if (CSRFToken::verifyCSRFToken($request->token, false)) {
                $rules = [
                    'name' => [
                        'required' => true,
                        'minLength' => 6,
                        'string' => true
                    ],
                    'category_id' => ['required' => true]
                ];

                $validate = new ValidateRequest();
                $validate->abide($_POST, $rules);

                // Check subcategory exists or not
                $duplicate_subcategory = SubCategory::where('name', $request->name)->where('category_id', $request->category_id)->exists();

                if ($duplicate_subcategory) {
                    $extra_errors['name'] = array('You have not made any changes.');
                }

                // Check product category exist or not
                $category = Category::where('id', $request->category_id)->exists();

                if (!$category) {
                    $extra_errors['name'] = array('Invalid product category.');
                }

                // Error validation
                if ($validate->hasError() || $duplicate_subcategory || !$category) {
                    $errors = $validate->getErrorMessages();
                    count($extra_errors) ? $response = array_merge($errors, $extra_errors) : $response = $errors;

                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);

                    echo json_encode($response);
                    exit();
                }

                SubCategory::where('id', $id)->update(
                    [
                        'name' => $request->name,
                        'category_id' => $request->category_id
                    ]
                );
                echo json_encode(['success' => 'SubCategory Updated Successfully']);
                exit();
            }

            throw new \Exception('Token mismatch');
        }

        return null;
    }

    /**
     * Delete SubCategory
     * @param $id
     * @return |null
     * @throws \Exception
     */

    public function delete($id)
    {
        if (Request::has('post')) {
            $request = Request::get('post');

            if (CSRFToken::verifyCSRFToken($request->token, false)) {

                SubCategory::destroy($id);

                Session::add('success', 'SubCategory Deleted');

                Redirect::to('/admin/product/categories');
                exit();
            }

            throw new \Exception('Token mismatch');
        }

        return null;
    }

}