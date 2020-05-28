@extends('layouts.app')
@section('title', 'Homepage')
@section('data-page-id', 'home')

@section('content')
    <div class="grid-container fluid">
        <div class="grid-x grid-margin-x">
            <div class="home cell large-12 medium-12 small-12">
                <section class="hero">
                    <div class="hero-slider">
                        <div><img src="/images/sliders/slide_1.jpg" alt="eTrade"></div>
                        <div><img src="/images/sliders/slide_2.jpg" alt="eTrade"></div>
                        <div><img src="/images/sliders/slide_3.jpg" alt="eTrade"></div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="grid-x grid-margin-x display-products" id="root">
            <div class="cell large-12 medium-12 small-12">
                <h2>Featured Products</h2>
            </div>
            <div class="cell large-3 medium-3 small-12" v-for="feature in featured">
                <a :href="'/product/' + feature.id">
                    <div class="card" data-equalizer-watch>
                        <div class="card-section">
                            <img :src="'/' + feature.image_path" width="100%" height="200">
                        </div>
                        <div class="card-section">
                            <h3 class="product-name">
                                @{{ stringLimit(feature.name, 18) }}
                            </h3>
                            <a :href="'/product/' + feature.id" class="button more expanded">See More</a>
                            <a :href="'/product/' + feature.id" class="button cart expanded">
                                $@{{ feature.price }} - Add to cart
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@stop