<?php

namespace Application\Entities;

use Nishchay\Attributes\Entity\Entity;
use Nishchay\Attributes\Entity\Property\{
    Identity,
    DataType
};

/**
 * Description of RefreshToken
 *
 * @author bhavik
 */
#[Entity(name: 'this.base')]
class RefreshToken
{

    /**
     * Refresh token id.
     * 
     * @var int
     */
    #[Identity]
    #[DataType(type: 'int', readOnly: true)]
    private $refreshTokenId;

    /**
     * Refresh token.
     * 
     * @var string
     */
    #[DataType(type: 'string')]
    private $token;

    /**
     * User id of user for whom access token was generated.
     * 
     * @var type
     */
    #[DataType(type: 'int')]
    private $userId;

    /**
     * Scopes for the access token.
     *  
     * @var array
     */
    #[DataType(type: 'array')]
    private $scopes;

    /**
     * When was refresh token created.
     * 
     * @var type
     */
    #[DataType(type: 'datetime')]
    private $createdAt;

    /**
     * Refresh token to be expire at.
     * 
     * @var type
     */
    #[DataType(type: 'datetime')]
    private $expireAt;

}
