<?php

namespace Application\Forms;

use Nishchay\Form\Form;
use Nishchay\Http\Request\Request;

/**
 * Description of Register
 *
 * @ClassType(type=form)
 */
class Register extends Form
{

    /**
     * Just calls parent method with form name and request type for this form.
     * This also remove CSRF for this form
     */
    public function __construct()
    {
        parent::__construct('register-form', Request::POST);

        # As This form will be used in web service we are restricting CSRF token,
        # If this form will be used in web application then remove below line.
        $this->removeCSRF();
    }

    /**
     * Returns username input field.
     * 
     * @return \Nishchay\Form\Field\Type\Input
     */
    public function getUsername()
    {
        return $this->newInput('username', 'text')
                        ->isRequired(true)
                        ->setValidation('string:min', 3)
                        ->setValidation('string:max', 20)
                        ->setMessage('string:min', l('minLength', ['field' => 'Username'], 'error'))
                        ->setMessage('string:max', l('maxLength', ['field' => 'Username'], 'error'));
    }

    /**
     * Returns firstName input field.
     * 
     * @return \Nishchay\Form\Field\Type\Input
     */
    public function getFirstname()
    {
        return $this->newInput('firstName', 'text')
                        ->isRequired(true)
                        ->setValidation('string:min', 3)
                        ->setValidation('string:max', 20)
                        ->setMessage('required', l('required', ['field' => 'First Name'], 'error'))
                        ->setMessage('string:min', l('minLength', ['field' => 'First Name'], 'error'))
                        ->setMessage('string:max', l('maxLength', ['field' => 'First Name'], 'error'));
    }

    /**
     * Returns lastName input field.
     * 
     * @return \Nishchay\Form\Field\Type\Input
     */
    public function getLastname()
    {
        return $this->newInput('lastName', 'text')
                        ->isRequired(true)
                        ->setValidation('string:min', 3)
                        ->setValidation('string:max', 20)
                        ->setMessage('required', l('required', ['field' => 'Last Name'], 'error'))
                        ->setMessage('string:min', l('minLength', ['field' => 'Last Name'], 'error'))
                        ->setMessage('string:max', l('maxLength', ['field' => 'Last Name'], 'error'));
    }

    /**
     * Returns password input field.
     * 
     * @return \Nishchay\Form\Field\Type\Input
     */
    public function getPassword()
    {
        return $this->newInput('password', 'password')
                        ->isRequired(true)
                        ->setValidation('string:min', 6)
                        ->setValidation('string:max', 20)
                        ->setMessage('required', l('required', ['field' => 'Password'], 'error'))
                        ->setMessage('string:min', l('minLength', ['field' => 'Password'], 'error'))
                        ->setMessage('string:max', l('maxLength', ['field' => 'Password'], 'error'));
        ;
    }

    /**
     * Returns isTermAccepted input field.
     * 
     * @return \Nishchay\Form\Field\Type\InputChoice
     */
    public function getTerms()
    {
        return $this->newInputChoice('isTermAccepted', 'checkbox')
                        ->setChoices(['Y' => ''])
                        ->isRequired(true)
                        ->setMessage('required', l('terms', [], 'error'));
    }

}
