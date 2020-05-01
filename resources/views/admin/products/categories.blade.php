
@extends('admin.layout.base')
@section('title', 'Product Categories')

@section('content')
    <div class="category">
        <div class="row expanded">
            <h2>Product Categories</h2>
        </div>

        <div class="row expanded">
            <div class="column medium-6 small-12">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="input-group-field" placeholder="Search by name">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Search">
                        </div>
                    </div>
                </form>
            </div>
            <div class="column medium-5 small-12 end">
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

        @if($message)
            <p>{{ $message }}</p>
        @endif

        <div class="row expanded">
            <div class="column small-12 medium-11">
                @if(count($categories))
                    <table class="hover">
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category['name'] }}</td>
                                    <td>{{ $category['slug'] }}</td>
                                    <td>{{ $category['added'] }}</td>
                                    <td width="100" class="text-center">
                                        <a href="#"><i class="fa fa-edit"></i></a>
                                        <a href="#"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $links !!}
                @else
                    <h3>You have not created any category</h3>
                @endif
            </div>
        </div>
    </div>
@endsection