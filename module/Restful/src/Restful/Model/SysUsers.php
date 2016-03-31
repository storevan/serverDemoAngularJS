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
class SysUsers {
    //put your code here
    private $userId;
    private $username;
    private $password;
    private $role;
    
    function getUserId() {
        return $this->userId;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getRole() {
        return $this->role;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRole($role) {
        $this->role = $role;
    }

     //fillter de validate du lieu luon
    protected $inputFilter;
    
    function exchangeArray($data) {
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->password = (isset($data['password'])) ?  $data['password'] : null;
        $this->userId =(isset($data['userId'])) ? $data['userId'] : null;
        $this->role =(isset($data['role'])) ? $data['role'] : null;
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
             
             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
    }

    public function setInputFilter(\Zend\InputFilter\InputFilterInterface $inputFilter) {
        
    }
}
