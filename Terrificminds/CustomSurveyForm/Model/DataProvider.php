<?php

namespace Terrificminds\CustomSurveyForm\Model;

use Terrificminds\CustomSurveyForm\Model\ResourceModel\CustomSurveyForm\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * To connect to db
     * @var array
     */
    protected $formCollectionFactory;
    /**
     * @var array
     */
    protected $loadedData;

    /**
     * Undocumented function
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $formCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $formCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $formCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Getdata function
     *
     * @return array
     */
    public function getData()
    {

        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        foreach ($items as $form) {
            $this->loadedData[$form->getId()] = $form->getData();
        }
        return $this->loadedData;
    }
}
