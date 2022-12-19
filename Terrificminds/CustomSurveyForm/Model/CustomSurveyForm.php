<?php

namespace  Terrificminds\CustomSurveyForm\Model;

use Magento\Framework\Model\AbstractModel;
use Terrificminds\CustomSurveyForm\Api\Data\FormInterface;

class CustomSurveyForm extends AbstractModel implements FormInterface
{
    /**
     * @var string
     */
    protected const CACHE_TAG = 'customer_survey_form';
    /**
     * @var string
     */
    protected $_cacheTag = 'customer_survey_form';
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
        return parent::getData(self::QUESTION1);
    }

    /**
     * @inheritDoc
     */
    public function setQuestion1($qn1)
    {
        return $this->setData(self::QUESTION1, $qn1);
    }

    /**
      * @inheritDoc
      */
      public function getQuestion2()
      {
          return parent::getData(self::QUESTION2);
      }
  
      /**
       * @inheritDoc
       */
      public function setQuestion2($qn2)
      {
          return $this->setData(self::QUESTION2, $qn2);
      }

    /**
     * @inheritDoc
     */
    public function getQuestion3()
    {
        return parent::getData(self::QUESTION3);
    }

    /**
     * @inheritDoc
     */
    public function setQuestion3($qn3)
    {
        return $this->setData(self::QUESTION3, $qn3);
    }

    /**
     * Construct function
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\CustomSurveyForm::class);
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