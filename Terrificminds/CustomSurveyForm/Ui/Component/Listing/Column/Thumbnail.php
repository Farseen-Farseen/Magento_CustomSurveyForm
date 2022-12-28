<?php 
declare(strict_types=1);
namespace Terrificminds\CustomSurveyForm\Ui\Component\Listing\Column;

use Magento\Backend\Model\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class Thumbnail extends Column {

  /**
   *
   * @var StoreManagerInterface
   */
  protected $storeManagerInterface;

  public function __construct(
    ContextInterface $context,
    UiComponentFactory $uiComponentFactory,
    StoreManagerInterface $storeManagerInterface,
    array $components = [],
    array $data = []
  ) {
      parent::__construct($context, $uiComponentFactory, $components, $data);
      $this->storeManagerInterface = $storeManagerInterface;
  }

  public function prepareDataSource(array $dataSource)
  {
    $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/custom.log');
    $logger = new \Zend_Log();
    $logger->addWriter($writer);
    $logger->info("/////////////////-----logger initiated-----//////////////////////");

    $url = $this->storeManagerInterface->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
    if(isset($dataSource['data']['items'])){
      $fieldName = $this->getData('name');
      foreach($dataSource["data"]["items"] as & $item) {
        $logger->info("resulllt " . print_r($item, true));
        if(!empty($item[$fieldName])){
          $item[$fieldName.'_src'] = $url. 'uploads/' .$item[$fieldName];
          $item[$fieldName.'_alt'] = '';
          // $item[$fieldName.'_orig_src'] = $url. 'uploads/' .$item[$fieldName];
        }   
    }
    }
    
    $logger->info("resulllt " . print_r($dataSource, true));
    return $dataSource;
  }
}
