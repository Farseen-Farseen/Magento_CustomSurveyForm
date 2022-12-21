<?php
 
namespace Terrificminds\CustomSurveyForm\Model\Source;
 
class MultiselectFile implements \Magento\Framework\Data\OptionSourceInterface
{
 
    /**
     * Retrieve status options array.
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => "pdf", 'label' => __('Pdf')],
            ['value' => "png", 'label' => __('png')],
            ['value' => "jpg", 'label' => __('jpg')]
        ];
    }
}

