<?php
declare(strict_types=1);
namespace Terrificminds\CustomSurveyForm\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class Index extends Action
{
    protected $resultPageFactory;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
        
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Terrificminds_CustomSurveyForm::customform');
        $resultPage->getConfig()->getTitle()->prepend(__('Custom Survey Form'));

        return $resultPage;
       
    
    }
    protected function _isAllowed()
    {
        return true;
    }
}



