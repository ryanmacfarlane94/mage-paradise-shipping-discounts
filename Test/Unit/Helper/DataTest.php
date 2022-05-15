<?php

declare(strict_types=1);

namespace MageParadise\ShippingDiscounts\Test\Unit\Helper;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use MageParadise\ShippingDiscounts\Helper\Data;

/**
 * @covers Pagearadise\ShippingDiscounts\Helper\Data
 */
class DataTest extends TestCase
{
    /**
     * @var Data|MockObject
     */
    protected $helper;

    protected function setUp(): void
    {
        $objectManager = new ObjectManager($this);

        $this->helper = $objectManager->getObject(Data::class);
    }

    /* Make sure our plugin is appending the Shipping Discount Options */
    public function testConstants()
    {

        $this->assertEquals('shipping_percent', $this->helper::SHIPPING_PERCENT_ACTION);
        $this->assertEquals('shipping_fixed_discount', $this->helper::SHIPPING_FIXED_DISCOUNT_ACTION);
    }
}
