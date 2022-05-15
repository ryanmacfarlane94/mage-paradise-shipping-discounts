<?php

declare(strict_types=1);

namespace MageParadise\ShippingDiscounts\Model\Rule\Action\Discount;

class ShippingFixedDiscount extends \Magento\SalesRule\Model\Rule\Action\Discount\AbstractDiscount
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
        $discountAmount = $rule->getDiscountAmount();

        if ($discountAmount > $shippingAmount) {
            $discountAmount = $shippingAmount;
        }

        $discountData->setAmount($discountAmount);
        $discountData->setBaseAmount($discountAmount);

        return $discountData;
    }
}
