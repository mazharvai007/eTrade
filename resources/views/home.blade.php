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

                <section>
                    <div id="root">
                        @{{ message }}
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        new Vue({
            el: '#root',
            data: {
                message: 'This is short intro to VueJs.'
            }
        });
    </script>
@stop