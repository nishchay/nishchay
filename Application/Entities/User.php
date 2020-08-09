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
     *
     * @DataType(type=string, length=50, required=true)
     */
    public $username;

    /**
     *
     * @DataType(type=string, length=250, required=true,encrypt=true)
     */
    public $firstName;

    /**
     *
     * @DataType(type=string, length=250, required=true,encrypt=true)
     */
    public $lastName;

    /**
     *
     * @DataType(type=string, length=250, required=true)
     */
    public $password;

    /**
     *
     * @DataType(type=datetime,default=now)
     */
    public $createdAt;

    /**
     *
     * @DataType(type=datetime)
     */
    public $updatedAt;

    /**
     *
     * @DataType(type=boolean,default=false)
     */
    public $isDeleted;

    /**
     *
     * @DataType(type=datetime)
     */
    public $deletedAt;

}
