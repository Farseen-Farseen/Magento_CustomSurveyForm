<?php

namespace Terrificminds\CustomSurveyForm\Model\ResourceModel\CustomSurveyForm;

use Terrificminds\CustomSurveyForm\Model\CustomSurveyForm;
use Terrificminds\CustomSurveyForm\Model\ResourceModel\CustomSurveyForm as FormResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Construct function
     */
    protected function _construct()
    {
        $this->_init(
            CustomSurveyForm::class,
            FormResourceModel::class
        );
    }
}