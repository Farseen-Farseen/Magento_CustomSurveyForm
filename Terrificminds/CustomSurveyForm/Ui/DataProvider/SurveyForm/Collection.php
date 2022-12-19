<?php

namespace Terrificminds\CustomSurveyForm\Ui\DataProvider\SurveyForm;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

/**
 * Class Collection to collect data
 */
class Collection extends SearchResult
{
    /**
     * Override _initSelect to add custom columns
     *
     * @return void
     */
    protected function _initSelect()
    {
        $this->addFilterToMap('id', 'main_table.id');
        parent::_initSelect();
    }
}
