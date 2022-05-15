<?php

declare(strict_types=1);

namespace MageParadise\ShippingDiscounts\Plugin;

use Magento\SalesRule\Model\Rule\Action\SimpleActionOptionsProvider;

class ShippingDiscountOptions
{
    protected $data;

    /**
     * @param \MageParadise\ShippingDiscounts\Helper\Data $data
     */
    public function __construct(\MageParadise\ShippingDiscounts\Helper\Data $data)
    {
        $this->data = $data;
    }

    /**
     * This plugin adds additional Action options to the Cart Price Rules form.
     *
     * @param SimpleActionOptionsProvider $subject
     * @param array $result
     * @return array
     */
    public function afterToOptionArray(SimpleActionOptionsProvider $subject, $result)
    {
        array_push(
            $result,
            ['label' => __('Shipping Method Percent Discount'),
                'value' => $this->data::SHIPPING_PERCENT_ACTION,
                'group' => 'shipping_discounts'
            ],
            ['label' => __('Shipping Method Fixed Discount'),
                'value' => $this->data::SHIPPING_FIXED_DISCOUNT_ACTION,
                'group' => 'shipping_discounts'
            ]
        );
        return $result;
    }
}
