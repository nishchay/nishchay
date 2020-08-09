<?php

namespace Application\Features;

use Nishchay;
use Exception;
use Nishchay\Exception\ApplicationException;
use Nishchay\Exception\AuthorizationFailedException;
use Extension\Exception\ValidationException;
use Application\Models\User as UserModel;
use Application\Forms\Login as LoginForm;
use Application\Forms\Register as RegisterForm;
use Nishchay\Session\Session;
use Nishchay\Utility\StringUtility;

/**
 * Class for account feature.
 * This should contains each implementation related to user account.
 * 
 * @ClassType(type=feature)
 */
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
     * Returns token.
     * 
     * @return string
     */
    private function getToken(): string
    {
        return StringUtility::getRandomString(1024, true);
    }

    /**
     * Makes user login into application.
     * 
     * @param LoginForm $loginForm
     * @throws AuthorizationFailedException
     */
    public function doLogin(LoginForm $loginForm)
    {
        try {
            $user = $this->getUserModel()
                    ->getUserByUsername($loginForm->getUsername()->getRequest());

            # User not found.
            if ($user === false) {
                throw new ValidationException(l('username.invalid', [], 'error'));
            }

            # Verifying request password with user actual password.
            if (password_verify($loginForm->getPassword()->getRequest(), $user->password) === false) {
                throw new ValidationException(l('password.invalid', [], 'error'));
            }

            # Setting login data.
            $this->setLoginSession($user->userId);

            # Returning token to be use for web service.
            return [
                'token' => $this->getToken()
            ];
        } catch (Exception $e) {
            if ($e instanceof ValidationException) {
                throw $e;
            }

            Nishchay::getLogger()->error($e->getLine() . ' in file: ' . $e->getFile() . ' at line: ' . $e->getLine());
            throw new ApplicationException(l('internalError', [], 'error'));
        }

        # Nothing worked
        throw new ApplicationException(l('internalError', [], 'error'));
    }

    /**
     * Register new user.
     * 
     * @param RegisterForm $registerForm
     * @throws ValidationException
     */
    public function doRegister(RegisterForm $registerForm)
    {
        try {
            # username should be uique so here checking if user with same username already exists.
            if ($this->getUserModel()->getUserByUsername($registerForm->getUsername()->getRequest()) !== false) {
                throw new ValidationException(l('username.exists', [], 'error'));
            }

            $user = $this->getUserModel()->getFresh();

            $user->userame = $registerForm->getUsername()->getRequest();
            $user->firstName = $registerForm->getFirstname()->getRequest();
            $user->lastName = $registerForm->getLastname()->getRequest();
            $user->password = password_hash($registerForm->getPassword()->getRequest(), PASSWORD_BCRYPT);

            # Saving to DB
            if ($user->save()) {
                $this->setLoginSession($user->userId);

                # Returning token to be use in web service.
                return [
                    'token' => $this->getToken()
                ];
            }
        } catch (Exception $e) {
            if ($e instanceof ValidationException) {
                throw $e;
            }

            Nishchay::getLogger()->error($e->getLine() . ' in file: ' . $e->getFile() . ' at line: ' . $e->getLine());
            throw new ApplicationException(l('internalError', [], 'error'));
        }

        # Nothing worked
        throw new ApplicationException(l('internalError', [], 'error'));
    }

    /**
     * Sets login session data.
     * 
     * @param int $userId
     */
    public function setLoginSession(int $userId)
    {
        $session = new Session();
        $session->userId = $userId;
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
