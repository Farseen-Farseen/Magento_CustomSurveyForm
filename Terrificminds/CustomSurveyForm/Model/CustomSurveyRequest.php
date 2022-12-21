<?php

namespace  Terrificminds\CustomSurveyForm\Model;

use Magento\Framework\Model\AbstractModel;
use Terrificminds\CustomSurveyForm\Api\Data\FormInterface;

class CustomSurveyRequest extends AbstractModel implements FormInterface
{
    /**
     * @var string
     */
    protected const CACHE_TAG = 'md_customer_survey_request';
    /**
     * @var string
     */
    protected $_cacheTag = 'md_customer_survey_request';
    /**
     * @inheritDoc
     */
    public function getId()
    {
        return parent::getData(self::ID);
    }

    /**
     * @inheritDoc
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return parent::getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return parent::getData(self::EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }
     /**
      * @inheritDoc
      */
    public function getQuestion1()
    {
        return parent::getData(self::Question1);
    }

    /**
     * @inheritDoc
     */
    public function setQuestion1($qn1)
    {
        return $this->setData(self::Question1, $qn1);
    }

    public function getQuestion2()
    {
        return parent::getData(self::Question2);
    }

    /**
     * @inheritDoc
     */
    public function setQuestion2($qn2)
    {
        return $this->setData(self::Question2, $qn2);
    }
     /**
      * @inheritDoc
      */

    public function getQuestion3()
      {
          return parent::getData(self::Question3);
      }
  
      /**
       * @inheritDoc
       */
    public function setQuestion3($qn3)
      {
          return $this->setData(self::Question3, $qn3);
      }
    public function getQuestion4()
      {
          return parent::getData(self::Question4);
      }
  
      /**
       * @inheritDoc
       */
    public function setQuestion4($qn4)
      {
          return $this->setData(self::Question4, $qn4);
      }
    public function getQuestion5()
      {
          return parent::getData(self::Question5);
      }
  
      /**
       * @inheritDoc
       */
    public function setQuestion5($qn5)
      {
          return $this->setData(self::Question5, $qn5);
      }
    public function getImage()
      {
          return parent::getData(self::Image);
      }
  
      /**
       * @inheritDoc
       */
    public function setImage($image)
      {
          return $this->setData(self::Image, $image);
      }
    
    /**
     * Construct function
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\CustomSurveyRequest::class);
    }

    /**
     * GetIdentities function
     *
     * @return id
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * GetDefaultValues function
     *
     * @return array
     */
    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }
}
