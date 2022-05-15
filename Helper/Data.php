<?php

declare(strict_types=1);

namespace MageParadise\ShippingDiscounts\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    const SHIPPING_PERCENT_ACTION = 'shipping_percent';
    const SHIPPING_FIXED_DISCOUNT_ACTION = 'shipping_fixed_discount';
}
