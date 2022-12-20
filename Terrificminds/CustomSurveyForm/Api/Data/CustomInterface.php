<?php

/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Terrificminds\CustomSurveyForm\Api\Data;

/**
 * @api
 * @since 100.0.2
 */
interface CustomInterface
{
    /**#@+
     * Constants defined for keys of  data array
     */
    public const ID = 'id';
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const QN1 = 'qn1';
    public const QN2 = 'qn2';
    public const QN3 = 'qn3';
    public const QN4 = 'qn4';
    public const QN5 = 'qn5';
    public const IMAGE = 'image';
    public const CREATEDAT= 'created_at';
    public const ATTRIBUTES = [
        self::ID,
        self::NAME,
        self::EMAIL,
        self::QN1,
        self::QN2,
        self::QN3,
        self::QN4,
        self::QN5,
        self::IMAGE,
        self::CREATED_AT,
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
        *  Capacity
        *
        * @return  float|null
        */
    public function getQn1();

    /**
     * Set  Capacity
     *
     * @param  float $capacity
     * @return $this
     */
    public function setQn1($qn1);
  /**#@-*/

    /**
     * Product quantity
     *
     * @return int|null
     */
    public function getQn2();

    /**
     * Set product quantity
     *
     * @param int $qty
     * @return $this
     */
    public function setQn2($qn2);

    /**
     * Customization Requirement
     *
     * @return string|null
     */
    public function getQn3();

    /**
     * Set Customization Requirement
     *
     * @param string $customization
     * @return $this
     */
    public function setQn3($qn3);

    /**
     * Product description
     *
     * @return string|null
     */
    public function getQn4();

    /**
     * Set Customization Requirement
     *
     * @param string $customization
     * @return $this
     */
    public function setQn4($qn4);

    /**
     * Product description
     *
     * @return string|null
     */
    public function getQn5();

    /**
     * Set Customization Requirement
     *
     * @param string $customization
     * @return $this
     */
    public function setQn5($qn5);

    /**
     * Product description
     *
     * @return string|null
     */
    public function getImage();

    /**
     * Set Customization Requirement
     *
     * @param string $customization
     * @return $this
     */
    public function setImage($image);

    /**
     * Product description
     *
     * @return string|null
     */

    public function getCreatedAt();

    /**
     * Set product description
     *
     * @param string $description
     * @return $this
     */
    public function setCreatedAt($created_at);
}
