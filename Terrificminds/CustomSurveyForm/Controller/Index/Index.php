<?php
declare(strict_types=1);
namespace Terrificminds\CustomSurveyForm\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\ForwardFactory;
use Terrificminds\CustomSurveyForm\Helper\Data;
use Terrificminds\CustomSurveyForm\Block\Form;
use Magento\Framework\App\Response\RedirectInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

/**
 * Index class to create a page,get config value
 */
class Index implements HttpGetActionInterface
{
      /**
       * @var ForwardFactory
       */
    protected $forwardFactory;
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    /**
     * $helperData variable
     *
     * @var Terrificminds\CustomSurveyForm\Helper\Data
     */
    protected $helperData;
     /**
     * Form variable
     *
     * @var Terrificminds\CustomSurveyForm\Block\Form
     */
    protected $formReferer;
    /**
    * @var RedirectInterface;
    */
    protected $redirect;
    /**
    * @var RedirectFactory;
    */
    protected $resultRedirectFactory;

    /**
     * Undocumented function
     *
     * @param PageFactory $resultPageFactory
     * @param \Terrificminds\CustomSurveyForm\Helper\Data $helperData
     * @param ForwardFactory $forwardFactory
     * @param Form $formReferer
     */
    public function __construct(
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        PageFactory $resultPageFactory,
        Data $helperData,
        ForwardFactory $forwardFactory,
        Form $formReferer,
        \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory
    ) {
        $this->forwardFactory = $forwardFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->helperData = $helperData;
        $this->formReferer = $formReferer;
        $this->redirect = $redirect;
        $this->resultRedirectFactory = $resultRedirectFactory;
    }
    /**
     * Prints the information
     *
     * @return Page
     */
    public function execute()
    {
        $priorPath= $this->formReferer->getPath();
        $forward = $this->forwardFactory->create();
        $linkConfig = $this->helperData->getConfigValue('enable');
        if ($linkConfig) {
            if($priorPath== "https://app.exampleproject.test/checkout/onepage/success/"){
                return $this->resultPageFactory->create();  
            }
            else{
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setUrl('https://app.exampleproject.test');
            }
        }else{
            return $forward->forward('defaultNoRoute');
        }
    }
}