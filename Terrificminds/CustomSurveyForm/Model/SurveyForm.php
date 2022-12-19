<?php

namespace Terrificminds\CustomSurveyForm\Model;

use Magento\Framework\Model\AbstractModel;
use Terrifcminds\CustomSurveyForm\Model\ResourceModel\SurveyForm as BlogResourceModel;


class SurveyForm extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this->_init(BlogResourceModel::class);
    }
}
