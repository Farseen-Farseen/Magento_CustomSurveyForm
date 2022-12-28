<?php
declare(strict_types=1);
namespace Terrificminds\CustomSurveyForm\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\ForwardFactory;
use Terrificminds\CustomSurveyForm\Helper\Data;

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
     * Undocumented function
     *
     * @param PageFactory $resultPageFactory
     * @param \Terrificminds\CustomSurveyForm\Helper\Data $helperData
     * @param ForwardFactory $forwardFactory
     */
    public function __construct(
        PageFactory $resultPageFactory,
        Data $helperData,
        ForwardFactory $forwardFactory
    ) {
        $this->forwardFactory = $forwardFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->helperData = $helperData;
    }

    /**
     * Prints the information
     *
     * @return Page
     */
    public function execute()
    {
        $forward = $this->forwardFactory->create();
        $linkConfig = $this->helperData->getConfigValue('enable');
        if ($linkConfig) {
            return $this->resultPageFactory->create();
        } else {
            return $forward->forward('defaultNoRoute');
        }
    }
}