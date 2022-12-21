<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By : Rohan Hapani
 */

namespace Terrificminds\CustomSurveyForm\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Terrificminds\CustomSurveyForm\Api\FormRepositoryInterface;

class Delete extends Action
{
    /**
     * @var FormRepositoryInterface
     */
    protected FormRepositoryInterface $customRepository;
    /**
     * Construct function
     *
     * @param Context $context
     * @param Terrificminds\CustomSurveyForm\Api\FormRepositoryInterface $customRepository
     */
    public function __construct(
        Context $context,
        FormRepositoryInterface $customRepository
    ) {
        parent::__construct($context);
        $this->customRepository = $customRepository;
    }
    /**
     * Isallowed function
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Terrificminds_CustomSurveyForm::index_delete');
    }
    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $customInterface = $this->customRepository->getById($id);
                $this->customRepository->delete($customInterface);
                $this->messageManager->addSuccessMessage(__('Record deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('Record does not exist.'));
        return $resultRedirect->setPath('*/*/');
    }
}
