<?php

namespace Terrificminds\CustomSurveyForm\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Terrificminds\CustomSurveyForm\Api\Data\FormInterface;
use Terrificminds\CustomSurveyForm\Api\Data\FormSearchResultInterfaceFactory;
use Terrificminds\CustomSurveyForm\Api\FormRepositoryInterface;
use Terrificminds\CustomSurveyForm\Model\ResourceModel\CustomSurveyForm;
use Terrificminds\CustomSurveyForm\Model\ResourceModel\CustomSurveyForm\CollectionFactory;

class FormRepository implements FormRepositoryInterface
{
    /**
     * @var CustomSurveyFormFactory
     */
    protected $CustomSurveyFormFactory;

    /**
     * @var customForm
     */
    protected $FormResource;

    /**
     * @var CustomSurveyFormCollectionFactory
     */
    protected $CustomSurveyFormCollectionFactory;

    /**
     * @var FormSearchResultInterfaceFactory
     */
    protected $searchResultFactory;
    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     *
     * @param CustomSurveyFormFactory $CustomSurveyFormFactory
     * @param CustomSurveyForm $FormResource
     * @param CollectionFactory $CustomSurveyFormCollectionFactory
     * @param FormSearchResultInterfaceFactory $FormSearchResultInterfaceFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        CustomSurveyFormFactory $CustomSurveyFormFactory,
        CustomSurveyForm $FormResource,
        CollectionFactory $CustomSurveyFormCollectionFactory,
        FormSearchResultInterfaceFactory $FormSearchResultInterfaceFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->CustomSurveyFormFactory = $CustomSurveyFormFactory;
        $this->FormResource = $FormResource;
        $this->CustomSurveyFormCollectionFactory = $CustomSurveyFormCollectionFactory;
        $this->searchResultFactory = $FormSearchResultInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * To get by id
     *
     * @param int $id
     * @return \Terrificminds\CustomSurveyForm\Api\Data\FormInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id)
    {
        $customForm = $this->CustomSurveyFormFactory->create();
        $this->FormResource->load($customForm, $id);
        if (!$customForm->getId()) {
            throw new NoSuchEntityException(__('Unable to find customer with ID "%1"', $id));
        }
        return $customForm;
    }

    /**
     * To Save
     *
     * @param \Terrificminds\CustomSurveyForm\Api\Data\FormInterface $customForm
     * @return \Terrificminds\CustomSurveyForm\Api\Data\FormInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(FormInterface $customForm)
    {
        $this->FormResource->save($customForm);
        return $customForm;
    }

    /**
     * To delete
     *
     * @param \Terrificminds\CustomSurveyForm\Api\Data\FormInterface $customForm
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(FormInterface $customForm)
    {
        try {
            $this->FormResource->delete($customBForm);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }

        return true;
    }

    /**
     * To get the List
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Terrificminds\CustomSurveyForm\Api\Data\FormSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->CustomSurveyFormCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }
}