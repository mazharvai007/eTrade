
@extends('admin.layout.base')
@section('title', 'Dashboard')

@section('content')
    <div class="dashboard grid-container fluid">
        <div class="grid-x grid-margin-x">
            <div class="cell large-12 medium-12 small-12">
                <h2>Dashboard</h2>

                <form action="/admin" method="post" enctype="multipart/form-data">
                    <input name="product" value="Testing">
                    <input type="file" name="image">
                    <input type="submit" value="Go" name="submit">
                </form>
            </div>
        </div>
    </div>
@endsection