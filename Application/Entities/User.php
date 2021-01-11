<?php

namespace Application\Entities;

/**
 * Entity class for User table.
 *
 * @Entity(name='this.base')
 */
class User
{

    /**
     *
     * @Identity
     * @DataType(type=int, readonly=true)
     */
    public $userId;

    /**
     * @Validation(rule='email')
     * @DataType(type=string, length=50, required=true,encrypt=true)
     */
    public $email;

    /**
     * @Validation(rule='string:min',parameter=3)
     * @Validation(rule='string:max',parameter=20)
     * @DataType(type=string, length=250, required=true,encrypt=true)
     */
    public $firstName;

    /**
     * @Validation(rule='string:min',parameter=3)     
     * @Validation(rule='string:max',parameter=20)
     * @DataType(type=string, length=250, required=true,encrypt=true)
     */
    public $lastName;

    /**
     *
     * @Validation(rule='string:min',parameter=6)     
     * @Validation(rule='string:max',parameter=250)
     * @DataType(type=string, length=250, required=true)
     */
    public $password;

    /**
     *
     * @DataType(type=boolean,default=true)
     */
    public $isActive;

    /**
     *
     * @DataType(type=boolean,default=false)
     */
    public $isVerified;

    /**
     *
     * @DataType(type=datetime)
     */
    public $verifiedAt;

}
