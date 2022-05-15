<?php

namespace MageParadise\ShippingDiscounts\Model;

use Magento\Checkout\Model\ConfigProviderInterface;

class CustomConfigProvider implements ConfigProviderInterface
{

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $enabled = $this->scopeConfig->getValue(
            'shipping-discounts/general/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        $discountMessage = $this->scopeConfig->getValue(
            'shipping-discounts/general/display_text',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        if ($enabled == 1) {
            $config = [
                'shipping_discount_text' => $discountMessage
            ];
        } else {
            $config = [
                'shipping_discount_text' => ''
            ];
        }

        return $config;
    }
}
