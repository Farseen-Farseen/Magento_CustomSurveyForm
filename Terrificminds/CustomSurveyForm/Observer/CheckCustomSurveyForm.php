<?php

namespace Terrificminds\CustomSurveyForm\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Captcha\Observer\CaptchaStringResolver;
use Magento\Captcha\Helper\Data;
use Magento\Framework\App\ActionFlag;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\App\Response\RedirectInterface;

class CheckCustomSurveyForm implements ObserverInterface
{
    /**
     * @var \Magento\Captcha\Helper\Data
     */
    protected $_helper;

    /**
     * @var \Magento\Framework\App\ActionFlag
     */
    protected $_actionFlag;

    /**
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $messageManager;

    /**
     * @var \Magento\Framework\App\Response\RedirectInterface
     */
    protected $redirect;

    /**
     * @var CaptchaStringResolver
     */
    protected $captchaStringResolver;

    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     *
     * @param \Magento\Captcha\Helper\Data $helper
     * @param \Magento\Framework\App\ActionFlag $actionFlag
     * @param \Magento\Framework\Message\ManagerInterface $messageManager
     * @param \Magento\Framework\App\Response\RedirectInterface $redirect
     * @param CaptchaStringResolver $captchaStringResolver
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Data $helper,
        ActionFlag $actionFlag,
        ManagerInterface $messageManager,
        RedirectInterface $redirect,
        CaptchaStringResolver $captchaStringResolver,
        DataPersistorInterface $dataPersistor
    ) {
        $this->_helper = $helper;
        $this->_actionFlag = $actionFlag;
        $this->messageManager = $messageManager;
        $this->redirect = $redirect;
        $this->captchaStringResolver = $captchaStringResolver;
        $this->dataPersistor = $dataPersistor;
    }

    /**
     * Check CAPTCHA on Custom Form
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $formId = 'custom_survey_form';
        $captcha = $this->_helper->getCaptcha($formId);
        if ($captcha->isRequired()) {
            /** @var \Magento\Framework\App\Action\Action $controller */
            $controller = $observer->getControllerAction();
            if (!$captcha->isCorrect($this->captchaStringResolver->resolve($controller->getRequest(), $formId))) {
                $this->messageManager->addErrorMessage(__('Incorrect CAPTCHA.'));
                $this->getDataPersistor()->set($formId, $controller->getRequest()->getPostValue());
                $this->_actionFlag->set('', \Magento\Framework\App\ActionInterface::FLAG_NO_DISPATCH, true);
                $this->redirect->redirect($controller->getResponse(), 'CustomSurveyForm');
            }
        }
    }

    /**
     * Get Data Persistor
     *
     * @return DataPersistorInterface
     */
    private function getDataPersistor()
    {
        return $this->dataPersistor;
    }
}
