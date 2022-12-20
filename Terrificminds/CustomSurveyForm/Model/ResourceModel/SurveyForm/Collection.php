<?php

namespace Terrificminds\CustomSurveyForm\Model\ResourceModel\SurveyForm;

use Terrificminds\CustomSurveyForm\Model\SurveyForm as BlogModel;
use Terrificminds\CustomSurveyForm\Model\ResourceModel\SurveyForm as BlogResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Construct function
     */
    protected function _construct()
    {
        $this->_init(
            BlogModel::class,
            BlogResourceModel::class
        );
    }
}

