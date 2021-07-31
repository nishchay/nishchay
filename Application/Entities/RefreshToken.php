<?php

namespace Application\Entities;



/**
 * Description of RefreshToken
 *
 * @Entity(name='this.base')
 */
class RefreshToken
{

    /**
     * Refresh token id.
     * 
     * @Identity
     * @DataType(type=int,readonly=true)
     */
    private $refreshTokenId;

    /**
     * Refresh token.
     * 
     * @DataType(type=string)
     */
    private $token;

    /**
     * User id of user for whom access token was generated.
     * 
     * @DataType(type=int)
     */
    private $userId;

    /**
     * Scopes for the access token.
     *  
     * @DataType(type=array)
     */
    private $scopes;

    /**
     * When was refresh token created.
     * 
     * @DataType(type=datetime)
     */
    private $createdAt;

    /**
     * Refresh token to be expire at.
     * 
     * @DataType(type=datetime)
     */
    private $expireAt;

}
