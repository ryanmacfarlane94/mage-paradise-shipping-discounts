define([
    'ko',
    'uiComponent'
], function (ko, Component) {
    'use strict';

    var configValues = window.checkoutConfig;

    return Component.extend({
        defaults: {
            template: 'MageParadise_ShippingDiscounts/shipping/comment'
        },
        getDiscountMessage: function() {
            return configValues.shipping_discount_text;
        }
    });
});