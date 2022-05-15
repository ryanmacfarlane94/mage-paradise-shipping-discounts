<?php

declare(strict_types=1);

namespace MageParadise\ShippingDiscounts\Test\Unit\Plugin;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\SalesRule\Model\Rule;
use Magento\SalesRule\Model\Rule\Action\SimpleActionOptionsProvider;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use MageParadise\ShippingDiscounts\Plugin\ShippingDiscountOptions;

/**
 * @covers MageParadise\ShippingDiscounts\Plugin\ShippingDiscountOptions
 */
class ShippingDiscountOptionsTest extends TestCase
{
    /**
     * @var SimpleActionOptionsProvider|MockObject
     */
    protected $model;
    /**
     * @var ShippingDiscountOptions|MockObject
     */
    protected $plugin;

    protected function setUp(): void
    {
        $objectManager = new ObjectManager($this);

        $this->model = $objectManager->getObject(SimpleActionOptionsProvider::class);
        $this->plugin = $objectManager->getObject(ShippingDiscountOptions::class);
    }

    /* Make sure our plugin is appending the Shipping Discount Options */
    public function testToOptionArray()
    {
        $hasShippingPercent = false;
        $hasShippingFixedDiscount = false;

        $options = $this->model->toOptionArray();
        $pluginOptions = $this->plugin->afterToOptionArray($this->model, $options);

        foreach ($pluginOptions as $option) {
            if ($option['value'] == 'shipping_percent') {
                $hasShippingPercent = true;
            }
            if ($option['value'] == 'shipping_fixed_discount') {
                $hasShippingFixedDiscount = true;
            }
        }

        $this->assertTrue($hasShippingPercent && $hasShippingFixedDiscount && $hasShippingFixedDiscount);
    }
}
