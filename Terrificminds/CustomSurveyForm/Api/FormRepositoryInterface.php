<?php
declare(strict_types=1);
namespace Terrificminds\CustomSurveyForm\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Terrificminds\CustomSurveyForm\Api\Data\FormInterface;

interface FormRepositoryInterface
{
    /**
     * @param int $id
     * @return \Terrificminds\CustomSurveyForm\Api\Data\FormInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Terrificminds\CustomSurveyForm\Api\Data\FormInterface $form
     * @return \Terrificminds\CustomSurveyForm\Api\Data\FormInterface
     */
    public function save(FormInterface $form);

    /**
     * @param \Terrificminds\CustomSurveyForm\Api\Data\FormInterface $form
     * @return void
     */
    public function delete(FormInterface $form);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Terrificminds\CustomSurveyForm\Api\Data\FormSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}