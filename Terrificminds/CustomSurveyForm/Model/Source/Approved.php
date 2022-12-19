<?php

namespace Terrificminds\CustomSurveyForm\Model\Source;

/**
 * Approved class to set the options
 */
class Approved implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * Retrieve status options array.
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'yes', 'label' => __('Yes')],
            ['value' => 'no', 'label' => __('No')]
        ];
    }
}
