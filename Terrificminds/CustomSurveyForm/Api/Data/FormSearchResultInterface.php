<?php
declare(strict_types=1);
namespace Terrificminds\CustomSurveyForm\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface FormSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Terrificminds\CustomSurveyForm\Api\Data\FormInterface[]
     */
    public function getItems();

    /**
     * @param \Terrificminds\CustomSurveyForm\Api\Data\FormInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}