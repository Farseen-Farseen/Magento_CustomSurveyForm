<?php

namespace Terrificminds\CustomSurveyForm\Model\ResourceModel;

class SurveyForm extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {       
        $this->_init('customsurvey_table', 'id');
    }
}
