
@extends('admin.layout.base')
@section('title', 'Create Product')
@section('data-page-id', 'adminProduct')

@section('content')
    <!-- Start Product Display -->
    <div class="add-product grid-container fluid">
        <div class="grid-x grid-margin-x">
            <div class="cell large-12 medium-12 small-12">
                <h2>Add Inventory Item</h2>
                <hr>
            </div>
        </div>

        @include('includes.message')

        <form method="post" action="/admin/product/create">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Name:
                        <input type="text" name="name" placeholder="Product Name" value="{{ \App\Classes\Request::old('post', 'name') }}">
                    </label>
                </div>
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Price:
                        <input type="text" name="price" placeholder="Product Price" value="{{ \App\Classes\Request::old('post', 'price') }}">
                    </label>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Category:
                        <select name="category" id="product-category">
                            <option value="{{ \App\Classes\Request::old('post', 'category') ? : '' }}">
                                {{ \App\Classes\Request::old('post', 'category') ? : '---Select Category---' }}
                            </option>

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Subcategory:
                        <select name="subcategory" id="product-subcategory">
                            <option value="{{ \App\Classes\Request::old('post', 'subcategory') ? : '' }}">
                                {{ \App\Classes\Request::old('post', 'subcategory') ? : '---Select SubCategory---' }}
                            </option>
                        </select>
                    </label>
                </div>
            </div>
        </form>

    </div>
    <!-- End Product Display -->

    @include('includes.delete-modal')

@endsection