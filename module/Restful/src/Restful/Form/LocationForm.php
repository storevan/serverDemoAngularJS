<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LocationForm
 *
 * @author MageBay
 */
namespace Restful\Form;

use Zend\Form\Form;
class LocationForm extends Form{
    
    function __construct($name=null) {
        parent::__construct('location');

        $this->add(array(
            'name' => 'locationId',
            'type' => 'Hidden',
        ));
        
                
        $this->add(array(
            'name' => 'locationName',
            'type' => 'Text',
            'options' => array(
                'label' => 'Location Name',
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));

        $this->add(array(
            'name' => 'parentId',
            'type' => 'Select',
            'options' => array(
                'label' => 'Location Parent',
                'disable_inarray_validator' => true,
            ),
            'attributes' => array(
                'class' => 'input-text',
            ),
        ));

//        $this->add(array(
//            'name' => 'insert',
//            'type' => 'Submit',
//            'attributes' => array(
//                'value' => 'Save',
//                'id' => 'btnSave',
//            ),
//        ));
    }

}
