(function () {
    'use strict';

    $(document).foundation();

    $(document).ready(function () {
        // Switch Pages
        switch ($('body').data('page-id')) {
            case 'home':
                break;
            case 'adminProduct':
                eTrade.admin.changeEvent();
                eTrade.admin.delete();
                break;
            case 'adminCategories':
                eTrade.admin.update();
                eTrade.admin.delete();
                eTrade.admin.create();
                break;
            default:
                // do nothing
        }
    });

})();