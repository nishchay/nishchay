<?php

namespace Application\Container;

use Application\Entities\User;
use Application\Features\Account as AccountFeature;
use Nishchay\Attributes\Container\Container;
/**
 * AccountContainer class.
 *
 */
#[Container]
class AccountContainer
{

    /**
     * Returns instance of EntityManager of User entity.
     * 
     * @return \Nishchay\Data\EntityManager
     */
    public function getEntity()
    {
        return User::class;
    }

    /**
     * Returns instance of Account feature class.
     * 
     * @return AccountFeature
     */
    public function getFeature()
    {
        return AccountFeature::class;
    }

}
