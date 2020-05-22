
@extends('admin.layout.base')
@section('title', 'Edit Product')
@section('data-page-id', 'adminProduct')

@section('content')
    <!-- Start Product Display -->
    <div class="edit-product grid-container fluid">
        <div class="grid-x grid-margin-x">
            <div class="cell large-12 medium-12 small-12">
                <h2>Edit {{ $product->name }}</h2>
                <hr>
            </div>
        </div>

        @include('includes.message')

        <form method="post" action="/admin/product/edit" enctype="multipart/form-data">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Name:
                        <input type="text" name="name" value="{{ $product->name }}">
                    </label>
                </div>
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Price:
                        <input type="text" name="price" placeholder="Product Price" value="{{ $product->price }}">
                    </label>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Category:
                        <select name="category" id="product-category">
                            <option value="{{ $product->category->id }}">
                                {{ $product->category->name }}
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
                            <option value="{{ $product->subCategory->id }}">
                                {{ $product->subCategory->name }}
                            </option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-6 large-6">
                    <label>Product Quantity:
                        <select name="quantity">
                            <option value="{{ $product->quantity }}">
                                {{ $product->quantity }}
                            </option>

                            @for($i = 1; $i <= 50; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </label>
                </div>
                <div class="cell small-12 medium-6 large-6">
                    <br>
                    <div class="input-group">
                        <span class="input-group-label">Product Image</span>
                        <input class="input-group-field" type="file" name="productImage">
                    </div>
                </div>

                <div class="cell small-12">
                    <label>Product Description:
                        <textarea name="description" placeholder="Write the product description">{{ $product->description }}</textarea>
                    </label>
                    <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input class="button success float-right" type="Submit" value="Update Product">


                </div>
            </div>
        </form>

        <!-- Delete Product -->
        <div class="grid-x grid-margin-x">
            <div class="cell small-12 medium-6 large-6">
                <table data-form="deleteForm">
                    <tr style="border: 1px solid #ffffff !important;">
                        <td style="border: 1px solid #ffffff !important;padding: 0">
                            <form action="/admin/product/{{ $product['id'] }}/delete" method="post" class="delete-item">
                                <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                                <button type="submit" class="button alert">Delete Product</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- End Product Display -->

    @include('includes.delete-modal')

@endsection