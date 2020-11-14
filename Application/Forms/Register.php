<?php

namespace Application\Forms;

use Nishchay\Form\Form;
use Nishchay\Http\Request\Request;

/**
 * Description of Register
 *
 * @Form
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
    public function getEmail()
    {
        return $this->newInput('email', 'text')
                        ->isRequired(true)
                        ->setValidation('string:min', 3)
                        ->setValidation('string:max', 20);
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
                        ->setValidation('string:max', 20);
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
                        ->setValidation('string:max', 20);
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
                        ->setValidation('string:max', 20);
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
                        ->isRequired(true);
    }

}
