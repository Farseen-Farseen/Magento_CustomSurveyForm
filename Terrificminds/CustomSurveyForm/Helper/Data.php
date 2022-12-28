<?php
declare(strict_types=1);
namespace Terrificminds\CustomSurveyForm\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    protected const PATH = 'terrificminds/';
    
    /**
     * GetConfigValue function
     *
     * @param string $field
     * @return configuration value
     */
    public function getConfigValue($field)
    {
        return $this->scopeConfig->getValue(self::PATH . 'general/' . $field, ScopeInterface::SCOPE_STORE);
    }
}
