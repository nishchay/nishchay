<?php

namespace Application\Models;

use Application\Entities\User as UserEntity;
use Nishchay\Data\EntityManager;
use Nishchay\Security\Encrypt\EncryptTrait;
use Nishchay\Processor\FetchSingletonTrait;

/**
 * User model class
 *
 * @ClassType(type=model)
 */
class User
{

    use EncryptTrait,
        FetchSingletonTrait;

    /**
     * Returns instance EntityManager for User entity class.
     * 
     * @return EntityManager
     */
    private function getUserEntity()
    {
        return $this->getInstance(EntityManager::class, [UserEntity::class]);
    }

    /**
     * Returns use record by id.
     * 
     * @param int $id
     * @return EntityManager
     */
    public function get(int $id)
    {
        return $this->getUserEntity()
                        ->setUnFetchable(['password', 'isActive', 'isVerified', 'verifiedAt'])
                        ->get($id);
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
