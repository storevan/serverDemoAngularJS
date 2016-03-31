<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CatLocation
 *
 * @author MageBay
 */
namespace Restful\Model;

class UserInfo implements \Zend\InputFilter\InputFilterAwareInterface{
    //put your code here
    public $username;
    public $password;
    public $role;
    public $userId;
    public $firstName;
    public $lastName;
    public $email;
    public $national;
    public $province;
    public $homeAddress;
    public $zipCode;
    public $about;
    public $website;
    public $facebook;
    public $twitter;
    public $other;
    public $nationalName;
    public $provinceName;
    
    function getNationalName() {
        return $this->nationalName;
    }

    function getProvinceName() {
        return $this->provinceName;
    }

    function setNationalName($nationalName) {
        $this->nationalName = $nationalName;
    }

    function setProvinceName($provinceName) {
        $this->provinceName = $provinceName;
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

    function getUserId() {
        return $this->userId;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getEmail() {
        return $this->email;
    }

    function getNational() {
        return $this->national;
    }

    function getProvince() {
        return $this->province;
    }

    function getHomeAddress() {
        return $this->homeAddress;
    }

    function getZipCode() {
        return $this->zipCode;
    }

    function getAbout() {
        return $this->about;
    }

    function getWebsite() {
        return $this->website;
    }

    function getFacebook() {
        return $this->facebook;
    }

    function getTwitter() {
        return $this->twitter;
    }

    function getOther() {
        return $this->other;
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

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setNational($national) {
        $this->national = $national;
    }

    function setProvince($province) {
        $this->province = $province;
    }

    function setHomeAddress($homeAddress) {
        $this->homeAddress = $homeAddress;
    }

    function setZipCode($zipCode) {
        $this->zipCode = $zipCode;
    }

    function setAbout($about) {
        $this->about = $about;
    }

    function setWebsite($website) {
        $this->website = $website;
    }

    function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    function setTwitter($twitter) {
        $this->twitter = $twitter;
    }

    function setOther($other) {
        $this->other = $other;
    }
    
    //fillter de validate du lieu luon
    protected $inputFilter;
    
    function exchangeArray($data) {
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->password = (isset($data['password'])) ? md5($data['password']) : md5('123456a@');
        $this->role = (isset($data['role'])) ? $data['role'] : null;
        $this->userId =(isset($data['userId'])) ? $data['userId'] : null;
        $this->firstName =(isset($data['firstName'])) ? $data['firstName'] : null;
        $this->lastName = (isset($data['lastName'])) ? $data['lastName'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->national =(isset($data['national'])) ? $data['national'] : null;
        $this->province =(isset($data['province'])) ? $data['province'] : null;
        $this->homeAddress = (isset($data['homeAddress'])) ? $data['homeAddress'] : null;
        $this->zipCode = (isset($data['zipCode'])) ? $data['zipCode'] : null;
        $this->about = (isset($data['about'])) ? $data['about'] : null;
        $this->website = (isset($data['website'])) ? $data['website'] : null;
        $this->facebook = (isset($data['facebook'])) ? $data['facebook'] : null;
        $this->twitter = (isset($data['twitter'])) ? $data['twitter'] : null;
        $this->other = (isset($data['other'])) ? $data['other'] : null;
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
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));
//             $inputFilter->add(array(
//                 'name'     => 'password',
//                 'required' => true,
//                 'filters'  => array(
//                     array('name' => 'StripTags'),
//                     array('name' => 'StringTrim'),
//                 ),
//                 'validators' => array(
//                     array(
//                         'name'    => 'StringLength',
//                         'options' => array(
//                             'encoding' => 'UTF-8',
//                             'min'      => 3,
//                             'max'      => 32,
//                         ),
//                     ),
//                 ),
//             ));
//             
//            $inputFilter->add(array(
//            'name' => 'retypePassword',
//            'required' => true,
//            'filters' => array(
//                array('name' => 'StripTags'),
//                array('name' => 'StringTrim')
//            ),
//            'validators' => array(
//                array(
//                    'name' => 'StringLength',
//                    'options' => array(
//                        'encoding' => 'UTF-8',
//                        'min' => 3,
//                        'max' => 32
//                    ),
//                ),
//                array(
//                    'name' => 'Identical',
//                    'options' => array(
//                        'token' => 'password'
//                    )
//                )
//            )
//        ));
             
             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
    }

    public function setInputFilter(\Zend\InputFilter\InputFilterInterface $inputFilter) {
        
    }

}
