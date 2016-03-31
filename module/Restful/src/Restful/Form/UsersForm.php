<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restful\Form;

/**
 * Description of Users
 *
 * @author MageBay
 */
use Zend\Form\Form;
class UsersForm extends Form{
    //put your code here
    function __construct($name=null) {
        parent::__construct('user');

        $this->add(array(
            'name' => 'userId',
            'type' => 'Hidden',
        ));
        
                
        $this->add(array(
            'name' => 'username',
            'type' => 'Text',
            'options' => array(
                'label' => 'User Name',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        
//        $this->add(array(
//            'name' => 'password',
//            'type' => 'password',
//            'options' => array(
//                'label' => 'Password',
//            ),
//            'attributes' => array(
//                'class' => 'input-text',
//            ),
//        ));
//        $this->add(array(
//            'name' => 'retypePassword',
//            'type' => 'password',
//            'options' => array(
//                'label' => 'Re-Type Password',
//            ),
//            'attributes' => array(
//                'class' => 'input-text',
//            ),
//        ));

        $this->add(array(
            'name' => 'role',
            'type' => 'Select',
            'options' => array(
                'label' => 'Role',
                'disable_inarray_validator' => true,
                'value_options' => array(
                    '0' => 'User',
                    '1' => 'Admin',
                ),
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        $this->add(array(
            'name' => 'firstName',
            'type' => 'Text',
            'options' => array(
                'label' => 'First Name',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        $this->add(array(
            'name' => 'lastName',
            'type' => 'Text',
            'options' => array(
                'label' => 'Last Name',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'type' => 'Text',
            'options' => array(
                'label' => 'Email',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        
        $this->add(array(
            'name' => 'national',
            'type' => 'Select',
            'options' => array(
                'label' => 'National',
                'disable_inarray_validator' => true,
                'value_options' => array(
                    '-1' => '--Choose--',
                ),
            ),
            'attributes' => array(
                'class' => 'input-text',
                'onchange' => 'this.form.submit();'
            ),
        ));
        
        $this->add(array(
            'name' => 'province',
            'type' => 'Select',
            'options' => array(
                'label' => 'Province',
                'disable_inarray_validator' => true,
                'value_options' => array(
                    '-1' => '--Choose--',
                ),
              'disable_inarray_validator' => true,
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        $this->add(array(
            'name' => 'homeAddress',
            'type' => 'Text',
            'options' => array(
                'label' => 'Home Address',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        
        $this->add(array(
            'name' => 'zipCode',
            'type' => 'Text',
            'options' => array(
                'label' => 'Zip code',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        $this->add(array(
            'name' => 'about',
            'type' => 'Text',
            'options' => array(
                'label' => 'About',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        
        $this->add(array(
            'name' => 'website',
            'type' => 'Text',
            'options' => array(
                'label' => 'Website',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        
        $this->add(array(
            'name' => 'facebook',
            'type' => 'Text',
            'options' => array(
                'label' => 'Facebook',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        
        $this->add(array(
            'name' => 'twitter',
            'type' => 'Text',
            'options' => array(
                'label' => 'Twitter',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        
        $this->add(array(
            'name' => 'other',
            'type' => 'Text',
            'options' => array(
                'label' => 'Other',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        
        $this->add(array(
            'name' => 'insert',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Save',
                'id' => 'btnSave',
            ),
        ));
    }
    
}
