<?php

namespace Application\Forms;

use Nishchay\Form\Form;
use Nishchay\Http\Request\Request;

/**
 * User login form class.
 *
 * @Form
 */
class Login extends Form
{

    /**
     * Just calls parent method with form name and request type for this form.
     * This also remove CSRF for this form
     */
    public function __construct()
    {
        parent::__construct('login-form', Request::POST);

        # As This form will be used in web service we are restricting CSRF token,
        # If this form will be used in web application then remove below line.
        $this->removeCSRF();
    }

    /**
     * Returns username input field.
     * 
     * @return \Nishchay\Form\Field\Type\Input
     */
    public function getEmail()
    {
        return $this->newInput('email', 'text')
                        ->isRequired(true)
                        ->setValidation('email')
                        ->setMessage('email', 'Invalid email');
    }

    /**
     * Returns password input field.
     * 
     * @return \Nishchay\Form\Field\Type\Input
     */
    public function getPassword()
    {
        return $this->newInput('password', 'password')
                        ->isRequired(true);
    }

}
