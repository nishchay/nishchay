<?php

namespace Application\Features;

use Extension\Exception\ValidationException;
use Application\Models\User as UserModel;
use Nishchay\Attributes\ClassType;

/**
 * Class for account feature.
 * This should contains each implementation related to user account.
 * 
 */
#[ClassType(type: 'feature')]
class Account
{

    /**
     * Instance of user model.
     * 
     * @var UserModel
     */
    private $userModel;

    /**
     * Returns instance of User model.
     * 
     * @return UserModel
     */
    private function getUserModel()
    {
        if ($this->userModel !== null) {
            return $this->userModel;
        }

        return $this->userModel = new UserModel();
    }

    /**
     * Returns user detail.
     * 
     * @param int $userId
     * @return type
     * @throws ValidationException
     */
    public function getUser(int $userId)
    {
        # Fetching user by userId
        $user = $this->getUserModel()->get($userId);

        # User not found
        if ($user === false) {
            throw new ValidationException('Invalid userId');
        }

        # Returning user detail.
        return $user->getData('array', true, false);
    }

}
