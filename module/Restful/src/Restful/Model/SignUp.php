<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restful\Model;

/**
 * Description of SysUsers
 *
 * @author MageBay
 */
class SignUp {
    //put your code here
    private $username;
    private $password;
    private $retypePassword;
    
    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getRetypePassword() {
        return $this->retypePassword;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRetypePassword($retypePassword) {
        $this->retypePassword = $retypePassword;
    }

        
     //fillter de validate du lieu luon
    protected $inputFilter;
    
    function exchangeArray($data) {
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->password = (isset($data['password'])) ? md5($data['password']) : null;
        $this->retypePassword = (isset($data['retypePassword'])) ? $data['retypePassword'] : null;
    }
    
    public function getArrayCopy()
     {
        return get_object_vars($this);
     }

  
    public function getInputFilter() {
         if (!$this->inputFilter) {
             $inputFilter = new \Zend\InputFilter\InputFilter();

             $inputFilter->add(array(
                 'name'     => 'username',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
             ));
             
             $inputFilter->add(array(
                 'name'     => 'password',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
             ));
             
             $inputFilter->add(array(
                'name' => 'retypePassword',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Identical',
                        'options' => array(
                            'token' => 'password',
                        ),
                    ),
                ),
            ));

            $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
    }

    public function setInputFilter(\Zend\InputFilter\InputFilterInterface $inputFilter) {
        
    }
}
