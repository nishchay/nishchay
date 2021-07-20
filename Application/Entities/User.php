<?php

namespace Application\Entities;

use Nishchay\Attributes\Entity\Entity;
use Nishchay\Attributes\Entity\Property\{
    DataType,
    Identity,
    Validation
};

/**
 * Entity class for User table.
 *
 */
#[Entity(name: 'this.base')]
class User
{

    /**
     * Identity property.
     * 
     * @var int
     */
    #[Identity]
    #[DataType(type: 'int', readOnly: true)]
    public $userId;

    /**
     * Email.
     * 
     * @var string
     */
    #[Validation(rule: 'email')]
    #[DataType(type: 'string', length: 50, required: true, encrypt: true)]
    public $email;

    /**
     * First name.
     * 
     * @var string
     */
    #[Validation(rule: 'string:min', parameter: [3])]
    #[Validation(rule: 'string:max', parameter: [20])]
    #[DataType(type: 'string', length: 250, required: true, encrypt: true)]
    public $firstName;

    /**
     * Last name.
     * 
     * @var string
     */
    #[Validation(rule: 'string:min', parameter: [3])]
    #[Validation(rule: 'string:max', parameter: [20])]
    #[DataType(type: 'string', length: 250, required: true, encrypt: true)]
    public $lastName;

    /**
     * Password.
     * Use hashing for password.
     * 
     * @var string
     */
    #[Validation(rule: 'string:min', parameter: [3])]
    #[Validation(rule: 'string:max', parameter: [250])]
    #[DataType(type: 'string', length: 250, required: true)]
    public $password;

    /**
     * Is user active.
     * 
     * @var bool
     */
    #[DataType(type: 'boolean', default: true)]
    public $isActive;

    /**
     * Is user verified.
     * 
     * @var bool
     */
    #[DataType(type: 'boolean', default: false)]
    public $isVerified;

    /**
     * User verified at date and time.
     * 
     * @var \DateTime
     */
    #[DataType(type: 'datetime')]
    public $verifiedAt;

}
