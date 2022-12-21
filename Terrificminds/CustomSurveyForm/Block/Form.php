<?php

namespace Terrificminds\CustomSurveyForm\Block;

use Magento\Framework\View\Element\Template;
use Magento\Customer\Model\Session;
use Magento\Eav\Model\Config;
use Magento\Customer\Model\Customer;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\App\Response\RedirectInterface;

class Form extends Template
{
    /**
     * $getCustomerData variable
     *
     * @var Magento\Customer\Model\Customer
     */
    protected $getCustomerData;
    /**
     * $_eavConfig variable
     *
     * @var \Magento\Eav\Model\Config
     */
    protected $_eavConfig;
    /**
     * $customer variable
     *
     * @var Magento\Customer\Model\Session
     */
    protected $customer;
    /**
     * $_customerSession variable
     *
     * @var Magento\Customer\Model\Session
     */
    protected $_customerSession;

    protected $redirect;
    /**
     * Construct function
     *
     * @param Session $customer
     * @param Session $session
     * @param Config $eavConfig
     * @param Customer $getCustomerData
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        Session $customer,
        Session $session,
        Config $eavConfig,
        Customer $getCustomerData,
        Context $context,
        array $data = []
    ) {
        $this->customer = $customer;
        $this->_customerSession = $session;
        $this->_eavConfig = $eavConfig;
        $this->getCustomerData = $getCustomerData;
        $this->redirect = $redirect;
        parent::__construct($context, $data);
    }
    /**
     *
     * @return array
     */
    
   /**
    * GetCurrentUser function
    *
    * @return void
    */
    public function getCurrentUser()
    {
        $customerId = $this->customer->getId();
        $customerObj = $this->getCustomerData->load(($customerId));
        $customerdetail['email'] = $customerObj->getEmail();
        $customerdetail['name'] = $customerObj->getName();
        return $customerdetail;
    }
    /**
     * Getuser function
     *
     * @return string
     */
    public function getuser()
    {
        if ($this->_customerSession->isLoggedIn()) {
            return "true";
        } else {
            return "false";
        }
    }

    public function getPath(){
        $referer = $this->redirect->getRefererUrl();
        return $referer;
    }
}