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

class CatLocation implements \Zend\InputFilter\InputFilterAwareInterface{
    //put your code here
    public $locationId;
    public $locationName;
    public $parentId;
    public $parentName;
    protected $inputFilter;
    
    function exchangeArray($data) {
        $this->locationId = (isset($data['locationId'])) ? $data['locationId'] : null;
        $this->locationName = (isset($data['locationName'])) ? $data['locationName'] : null;
        $this->parentId = (isset($data['parentId']) && $data['parentId']!='-1') ? $data['parentId'] : null;
    }
    
    public function getArrayCopy()
     {
        return get_object_vars($this);
     }
    
     
    function getParentName() {
        return $this->parentName;
    }

    function setParentName($parentName) {
        $this->parentName = $parentName;
    }

        
    function getLocationId() {
        return $this->locationId;
    }

    function getLocationName() {
        return $this->locationName;
    }

    function getParentId() {
        return $this->parentId;
    }

    function setLocationId($locationId) {
        $this->locationId = $locationId;
    }

    function setLocationName($locationName) {
        $this->locationName = $locationName;
    }

    function setParentId($parentId) {
        $this->parentId = $parentId;
    }

    public function getInputFilter() {
         if (!$this->inputFilter) {
             $inputFilter = new \Zend\InputFilter\InputFilter();

             $inputFilter->add(array(
                 'name'     => 'locationName',
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
             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
    }

    public function setInputFilter(\Zend\InputFilter\InputFilterInterface $inputFilter) {
        
    }

}
