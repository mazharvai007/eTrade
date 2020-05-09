
@extends('admin.layout.base')
@section('title', 'Product Categories')
@section('data-page-id', 'adminCategories')

@section('content')
    <!-- Start Category Display -->
    <div class="category grid-container fluid">
        <div class="grid-x grid-margin-x">
            <div class="cell large-12 medium-12 small-12">
                <h2>Product Categories</h2>
                <hr>
            </div>
        </div>

        <div class="grid-x grid-margin-x">
            <div class="cell large-6 medium-6 small-12">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="input-group-field" placeholder="Search by name">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Search">
                        </div>
                    </div>
                </form>
            </div>
            <div class="cell large-6 medium-6 small-12 end">
                <form action="/admin/product/categories" method="post">
                    <div class="input-group">
                        <input type="text" class="input-group-field" name="name" placeholder="Category Name name">
                        <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @include('includes.message')

        <div class="grid-x grid-margin-x">
            <div class="cell large-12 small-12 medium-12">
                @if(count($categories))
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category['name'] }}</td>
                                    <td>{{ $category['slug'] }}</td>
                                    <td>{{ $category['added'] }}</td>
                                    <td width="100" class="text-center">
                                        <span data-tooltip class="top" tabindex="2" title="Add Subcategory">
                                           <a data-open="add-subcategory-{{ $category['id'] }}"><i class="fa fa-plus"></i></a>
                                        </span>
                                        <span data-tooltip class="top" tabindex="2" title="Edit Category">
                                           <a data-open="item-{{ $category['id'] }}"><i class="fa fa-edit"></i></a>
                                        </span>
                                        <span style="display: inline-block" data-tooltip class="top" tabindex="2" title="Delete Category">
                                            <form action="/admin/product/categories/{{ $category['id'] }}/delete" method="post" class="delete-item">
                                                <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                                                <button type="submit"><i class="fa fa-times delete"></i></button>
                                            </form>
                                        </span>

                                        <!-- Start Edit Category Modal -->
                                        <div class="reveal" id="item-{{ $category['id'] }}" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
                                            <div class="notification callout primary"></div>
                                            <h2>Edit Category</h2>
                                            <form>
                                                <div class="input-group">
                                                    <input type="text" id="item-name-{{ $category['id'] }}" name="name" value="{{ $category['name'] }}">
                                                    <div>
                                                        <input type="submit" class="button update-category" id="{{ $category['id'] }}" name="token" data-token="{{ \App\Classes\CSRFToken::_token() }}" value="Update">
                                                    </div>
                                                </div>
                                            </form>
                                            <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                        <!-- End Edit Category Modal -->

                                        <!-- Start Add Sub-Category Modal -->
                                        <div class="reveal" id="add-subcategory-{{ $category['id'] }}" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
                                            <div class="notification callout primary"></div>
                                            <h2>Add Sub-Category</h2>
                                            <form>
                                                <div class="input-group">
                                                    <input type="text" id="subcategory-name-{{ $category['id'] }}">
                                                    <div>
                                                        <input type="submit" class="button add-subcategory" id="{{ $category['id'] }}" name="token" data-token="{{ \App\Classes\CSRFToken::_token() }}" value="Create">
                                                    </div>
                                                </div>
                                            </form>
                                            <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                        <!-- End Add Sub-Category Modal -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Display Pagination -->
                    {!! $links !!}
                @else
                    <h3>You have not created any category</h3>
                @endif
            </div>
        </div>
    </div>
    <!-- End Category Display -->

    <!-- Start SubCategory Display -->
    <div class="subcategory grid-container fluid">
        <div class="grid-x grid-margin-x">
            <div class="cell large-12">
                <h2>Sub Categories</h2>
                <hr>
            </div>
        </div>

        <div class="grid-x grid-margin-x">
            <div class="cell large-12 small-12 medium-12">
                @if(count($subcategories))
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>{{ $subcategory['name'] }}</td>
                                    <td>{{ $subcategory['slug'] }}</td>
                                    <td>{{ $subcategory['added'] }}</td>
                                    <td width="100" class="text-center">
                                        <span data-tooltip class="top" tabindex="2" title="Edit Subcategory">
                                           <a data-open="item-subcategory-{{ $subcategory['id'] }}"><i class="fa fa-edit"></i></a>
                                        </span>
                                        <span style="display: inline-block" data-tooltip class="top" tabindex="2" title="Delete Subcategory">
                                            <form action="/admin/product/subcategory/{{ $subcategory['id'] }}/delete" method="post" class="delete-item">
                                                <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                                                <button type="submit"><i class="fa fa-times delete"></i></button>
                                            </form>
                                        </span>

                                        <!-- Start Edit SubCategory Modal -->
                                        <div class="reveal" id="item-subcategory-{{ $subcategory['id'] }}" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
                                            <div class="notification callout primary"></div>
                                            <h2>Edit Subcategory</h2>
                                            <form>
                                                <input type="text" id="item-subcategory-name-{{ $subcategory['id'] }}" value="{{ $subcategory['name'] }}">
                                                <label>
                                                    Change Category
                                                    <select name="" id="item-category-{{ $subcategory['category_id'] }}" id="">
                                                        @foreach(\App\Models\Category::all() as $category)
                                                            @if($category->id == $subcategory['category_id'])
                                                                <option selected="selected" value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endif
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                                <div>
                                                    <input type="submit" class="button update-subcategory" id="{{ $subcategory['id'] }}" data-category-id="{{ $subcategory['category_id'] }}" data-token="{{ \App\Classes\CSRFToken::_token() }}" value="Update">
                                                </div>
                                            </form>
                                            <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                        <!-- End Edit SubCategory Modal -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Display Pagination -->
                    {!! $subcategories_links !!}
                @else
                    <h3>You have not created any subcategory</h3>
                @endif
            </div>
        </div>
    </div>
    <!-- End SubCategory Display -->

    @include('includes.delete-modal')

@endsection