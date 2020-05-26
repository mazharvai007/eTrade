<?php
    $categories = \App\Models\Category::with('subCategories')->get();
?>

<header class="navigation">
    <div class="title-bar toggle" data-responsive-toggle="main-menu" data-hide-for="medium">
        <button class="menu-icon" type="button" data-toggle="main-menu"></button>
        <a href="/" class="float-right logo">eTrade</a>
    </div>

    <div class="hide-for-medium">
        <div class="top-bar" id="main-menu" data-dropdown-menu data-responsive-menu="drilldown medium-dropdown" data-click-open="true" data-disable-hover="true" data-close-on-click-inside="false">

            <div class="top-bar-title show-for-medium">
                <a href="/" class="logo">eTrade</a>
            </div>
            <div class="top-bar-left">
                <ul class="dropdown menu vertical medium-horizontal">
                    <li><a href="#">Products</a></li>

                    @if(count($categories))
                        <li>
                            <a href="#">Categories</a>
                            <ul class="menu vertical sub dropdown">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="#">{{ $category->name }}</a>
                                        @if(count($category->subCategories))
                                            <ul class="menu sub vertical">
                                                @foreach($category->subCategories as $subCategory)
                                                    <li>
                                                        <a href="#">{{ $subCategory->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="top-bar-right">
                <ul class="dropdown menu vertical medium-horizontal">
                    <li><a href="#">Username</a></li>
                    <li><a href="#">Sign In</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Cart</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="show-for-medium">
        <div class="top-bar" id="main-menu" data-dropdown-menu data-responsive-menu="drilldown medium-dropdown" data-click-open="true" data-disable-hover="true" data-close-on-click-inside="false">

            <div class="top-bar-title show-for-medium">
                <a href="/" class="logo">eTrade</a>
            </div>
            <div class="top-bar-left">
                <ul class="dropdown menu vertical medium-horizontal">
                    <li class="menu-text">Products</li>

                    @if(count($categories))
                        <li>
                            <a href="#">Categories</a>
                            <ul class="menu vertical sub dropdown">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="#">{{ $category->name }}</a>
                                        @if(count($category->subCategories))
                                            <ul class="menu sub vertical">
                                                @foreach($category->subCategories as $subCategory)
                                                    <li>
                                                        <a href="#">{{ $subCategory->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="top-bar-right">
                <ul class="dropdown menu vertical medium-horizontal">
                    <li class="menu-text">Username</li>
                    <li><a href="#">Sign In</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Cart</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>