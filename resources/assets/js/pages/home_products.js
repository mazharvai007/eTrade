(function () {
    'use strict';

    eTrade.homeSlider.homePageProducts = function () {
        var app = new Vue({
            el: '#root',
            data: {
                featured: [],
                loading: false
            },
            methods: {
                getFeaturedProducts: function () {
                    this.loading = true;
                    axios.get('/featured').then(function (response) {
                        console.log(response.data);
                    });
                }
            },
            created: function () {
                this.getFeaturedProducts();
            }
        });
    }
})();