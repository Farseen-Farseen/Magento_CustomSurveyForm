<?php

namespace Terrificminds\CustomSurveyForm\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Terrificminds\CustomRequestForm\Api\Data\CustomInterface;
use Terrificminds\CustomRequestForm\Api\Data\CustomSearchResultInterfaceFactory;
use Terrificminds\CustomRequestForm\Api\CustomRepositoryInterface;
use Terrificminds\CustomRequestForm\Model\ResourceModel\SurveyForm;
use Terrificminds\CustomRequestForm\Model\ResourceModel\SurveyForm\CollectionFactory;

class CustomRepository implements CustomRepositoryInterface
{
    /**
     * @var SurveyFormRequestFactory
     */
    protected $SurveyFormRequestFactory;

    /**
     * @var SurveyForm
     */
    protected $CustomResource;

    /**
     * @var SurveyFormRequestCollectionFactory
     */
    protected $SurveyFormRequestCollectionFactory;

    /**
     * @var CustomSearchResultInterfaceFactory
     */
    protected $searchResultFactory;
    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     *
     * @param SurveyFormRequestFactory $SurveyFormRequestFactory
     * @param SurveyFormRequest $CustomResource
     * @param CollectionFactory $SurveyFormRequestCollectionFactory
     * @param CustomSearchResultInterfaceFactory $CustomSearchResultInterfaceFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        SurveyFormRequestFactory $SurveyFormRequestFactory,
        SurveyFormRequest $CustomResource,
        CollectionFactory $SurveyFormRequestCollectionFactory,
        CustomSearchResultInterfaceFactory $CustomSearchResultInterfaceFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->SurveyFormRequestFactory = $SurveyFormRequestFactory;
        $this->CustomResource = $CustomResource;
        $this->SurveyFormRequestCollectionFactory = $SurveyFormRequestCollectionFactory;
        $this->searchResultFactory = $CustomSearchResultInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * To get by id
     *
     * @param int $id
     * @return \Terrificminds\CustomSurveyForm\Api\Data\CustomInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id)
    {
        $customBottle = $this->SurveyFormRequestFactory->create();
        $this->CustomResource->load($surveyForm, $id);
        if (!$surveyForm->getId()) {
            throw new NoSuchEntityException(__('Unable to find bottle with ID "%1"', $id));
        }
        return $surveyForm;
    }

    /**
     * To Save
     *
     * @param \Terrificminds\CustomSurveyForm\Api\Data\CustomInterface $surveyForm
     * @return \Terrificminds\CustomSurveyForm\Api\Data\CustomInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(CustomInterface $surveyForm)
    {
        $this->CustomResource->save($surveyForm);
        return $surveyForm;
    }

    /**
     * To delete
     *
     * @param \Terrificminds\CustomSurveyForm\Api\Data\CustomInterface $surveyForm
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(CustomInterface $surveyForm)
    {
        try {
            $this->CustomResource->delete($surveyForm);
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
     * @return \Terrificminds\CustomSurveyForm\Api\Data\CustomSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->SurveyFormRequestCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }
}