
@extends('admin.layout.base')
@section('title', 'Manage Inventory')
@section('data-page-id', 'adminProduct')

@section('content')
    <!-- Start Category Display -->
    <div class="products grid-container fluid">
        <div class="grid-x grid-margin-x">
            <div class="cell large-12 medium-12 small-12">
                <h2>Manage Inventory Items</h2>
                <hr>
            </div>
        </div>

        @include('includes.message')

        <div class="grid-x grid-margin-x">
            <div class="cell large-12 medium-12 small-12">
                <a href="/admin/product/create" class="button float-right">
                    <i class="fa fa-plus"></i> Add New Product
                </a>
            </div>
        </div>

        <div class="grid-x grid-margin-x">
            <div class="cell large-12 small-12 medium-12">
                @if(count($products))
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Sub-Category</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <img src="/{{ $product['image_path'] }}" alt="{{ $product['name'] }}" width="40" height="40">
                                    </td>
                                    <td>{{ $product['name'] }}</td>
                                    <td>{{ $product['price'] }}</td>
                                    <td>{{ $product['quantity'] }}</td>
                                    <td>{{ $product['category_name'] }}</td>
                                    <td>{{ $product['sub_category_name'] }}</td>
                                    <td>{{ $product['added'] }}</td>
                                    <td>
                                        <span data-tooltip class="top" tabindex="2" title="Edit Product">
                                           <a href="/admin/product/{{ $product['id'] }}/edit"><i class="fa fa-edit"></i></a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Display Pagination -->
                    {!! $links !!}
                @else
                    <h3>You have not created any products</h3>
                @endif
            </div>
        </div>
    </div>
    <!-- End Category Display -->
@endsection