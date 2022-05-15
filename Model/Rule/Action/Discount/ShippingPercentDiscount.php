<?php

declare(strict_types=1);

namespace MageParadise\ShippingDiscounts\Model\Rule\Action\Discount;

class ShippingPercentDiscount extends \Magento\SalesRule\Model\Rule\Action\Discount\AbstractDiscount
{

    /**
     * @param \Magento\SalesRule\Model\Rule $rule
     * @param \Magento\Quote\Model\Quote\Item\AbstractItem $item
     * @param float $qty
     * @return \Magento\SalesRule\Model\Rule\Action\Discount\Data
     */
    public function calculate($rule, $item, $qty)
    {
        /** @var \Magento\SalesRule\Model\Rule\Action\Discount\Data $discountData */
        $discountData = $this->discountFactory->create();

        $quote = $item->getQuote();

        if ($quote->getAppliedRuleIds()) {
            $appliedRules = explode(',', $quote->getAppliedRuleIds());

            if (in_array($rule->getId(), $appliedRules)) {
                return $discountData;
            }
        }

        $shippingAmount = $quote->getShippingAddress()->getShippingAmount();

        $discountAmount = $this->_calculate($rule->getDiscountAmount(), $shippingAmount);

        $discountData->setAmount($discountAmount);
        $discountData->setBaseAmount($discountAmount);

        return $discountData;
    }

    /**
     * @param float $discountPercent
     * @param float $shippingAmount
     * @return float
     */
    protected function _calculate($discountPercent, $shippingAmount)
    {
        if ($discountPercent > 100) {
            $discountPercent = 100;
        }

        return $shippingAmount * ($discountPercent / 100);
    }
}
