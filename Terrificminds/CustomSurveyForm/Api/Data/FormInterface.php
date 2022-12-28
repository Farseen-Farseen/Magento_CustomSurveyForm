<?php
declare(strict_types=1);
namespace Terrificminds\CustomSurveyForm\Api\Data;

/**
 * @api
 * @since 100.0.2
 */
interface FormInterface
{
    /**#@+
     * Constants defined for keys of  data array
     */
    public const ID = 'id';
    public const NAME = 'customer_name';
    public const EMAIL = 'email';
    public const QUESTION1 = 'qn1';
    public const QUESTION2 = 'qn2';
    public const QUESTION3 = 'qn3';
    public const QUESTION4 = 'qn4';
    public const QUESTION5 = 'qn5';
    public const IMAGE = 'image';
    public const ATTRIBUTES = [
        self::ID,
        self::NAME,
        self::EMAIL,
        self::QUESTION1,
        self::QUESTION2,
        self::QUESTION3,
        self::QUESTION4,
        self::QUESTION5,
        self::IMAGE
    ];
    /**
     *  Id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set  id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);
    /**
     * Customer name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Set customer name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);
     /**
      * Customer email
      *
      * @return string|null
      */
    public function getEmail();

    /**
     * Set customer email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
      * Question1
      *
      * @return string|null
      */
      public function getQuestion1();

      /**
       * Set Question1
       *
       * @param string $qn1
       * @return $this
       */
      public function setQuestion1($qn1);

       /**
      * Question2
      *
      * @return string|null
      */
      public function getQuestion2();

      /**
       * Set Question2
       *
       * @param string $qn2
       * @return $this
       */
      public function setQuestion2($qn2);

       /**
      * Question3
      *
      * @return string|null
      */
      public function getQuestion3();

      /**
       * Set Question3
       *
       * @param string $qn3
       * @return $this
       */
      public function setQuestion3($qn3);
/**
      * Question4
      *
      * @return string|null
      */
      public function getQuestion4();

      /**
       * Set Question4
       *
       * @param string $qn4
       * @return $this
       */
      public function setQuestion4($qn4);

      /**
      * Question5
      *
      * @return string|null
      */
      public function getQuestion5();

      /**
       * Set Question5
       *
       * @param string $qn5
       * @return $this
       */
      public function setQuestion5($qn5);

      /**
      * Image
      *
      * @return string|null
      */
      public function getImage();

      /**
       * Set Image
       *
       * 
       */
      public function setImage($path);

}