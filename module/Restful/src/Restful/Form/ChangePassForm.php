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
class ChangePassForm extends Form{
    //put your code here
    function __construct($name=null) {
        
        parent::__construct('changePass');

        
                
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
        
        $this->add(array(
            'name' => 'oldPassword',
            'type' => 'password',
            'options' => array(
                'label' => 'Old Password',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        
        $this->add(array(
            'name' => 'password',
            'type' => 'password',
            'options' => array(
                'label' => 'Password',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        
        $this->add(array(
            'name' => 'retypePassword',
            'type' => 'password',
            'options' => array(
                'label' => 'Re-Type Password',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));
        
//        $this->add([
//            'type' => 'Zend\Form\Element\Captcha',
//            'name' => 'captcha',
//            'options' => [
//                'label' => 'Please verify you are human.',
//                'captcha' => [
//                    'class' => 'Image',
//                    'options' => [
//                        'font',  __DIR__ . '/../captcha/Arial.ttf',
//                        'height' => 100,
//                        'dotNoiseLevel' => 40,
//                        'lineNoiseLevel' => 3,
//                        'imgDir' => '/../../captcha/'
//                    ],
//                ],
//            ],
//        ]);


        $this->add(array(
            'name' => 'changepass',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Change Password',
                'id' => 'btnSignup',
            ),
        ));
    }
    
}
