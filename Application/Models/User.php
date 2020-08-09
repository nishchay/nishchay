<?php

namespace Application\Models;

use Application\Entities\User as UserEntity;
use Nishchay\Data\EntityManager;
use Nishchay\Security\Encrypt\EncryptTrait;

/**
 * Description of User
 *
 * @ClassType(type=model)
 */
class User
{

    use EncryptTrait;

    /**
     * Instance of EntityManager for User entity.
     * 
     * @var EntityManager
     */
    private $userEntity;

    /**
     * Just creates instance of EntityManager for user entity.
     */
    public function __construct()
    {
        $this->userEntity = new EntityManager(UserEntity::class);
    }

    /**
     * Returns use record by id.
     * 
     * @param int $id
     * @return EntityManager
     */
    public function get(int $id)
    {
        return $this->userEntity
                        ->setUnFetchable(['password', 'createdAt', 'updatedAt', 'isDeleted', 'deletedAt'])
                        ->get($id);
    }

    /**
     * Returns user detail by username.
     * 
     * @param string $username
     * @return EntityManager
     */
    public function getUserByUsername(string $username)
    {
        $username = strtolower(trim($username));
        return $this->userEntity->getEntityQuery()
                        ->setCondition('username', $username)
                        ->getOne();
    }

    /**
     * Returns fresh instance of EntityManger class for User entity.
     * 
     * @return EntityManager
     */
    public function getFresh()
    {
        return new EntityManager(UserEntity::class);
    }

}
