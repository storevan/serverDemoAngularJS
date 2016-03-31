<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Restful\Controller;

class LocationController extends \Zend\Mvc\Controller\AbstractRestfulController {

    protected $catLocationTable;

    public function indexAction() {
        return new \Zend\View\Model\JsonModel(array(
            'catLocation' => $this->getCatLocationTable()->fetchAll(),
            'msgCode' => 'success',
        ));
    }

    public function getParentLocationAction() {
        return new \Zend\View\Model\JsonModel(array(
            'parentLocation' => $this->getCatLocationTable()->getLocationParent(),
            'msgCode' => 'success',
        ));
    }

    public function getLocationByParentAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $parentId = (int) $request->getPost('parentId');
            if (!$parentId) {
                return new \Zend\View\Model\JsonModel(
                        array('error' => 'Not found record', 'msgCode' => 'fail'));
            } else {
                $tbl = $this->getCatLocationTable()->getSelectCatLocationByParentId($parentId);
                return new \Zend\View\Model\JsonModel(array(
                    'province' =>$tbl,
                    'msgCode' => 'success',
                ));
            }
        }
    }

//    
    public function deleteAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $id = (int) $request->getPost('locationId');
            if (!$id) {
                return new \Zend\View\Model\JsonModel(
                        array('error' => 'Not found record', 'msgCode' => 'fail'));
            } else {
                $table = $this->getCatLocationTable()->getCatLocationById($id);
                if (!$table) {
                    return new \Zend\View\Model\JsonModel(
                            array('error' => 'Not found record', 'msgCode' => 'fail'));
                }
                $parentTbl = $this->getCatLocationTable()->getCatLocationByParentId($id);
                if ($parentTbl) {
                    $this->getCatLocationTable()->deleteLocationByParentId($id);
                }
                $this->getCatLocationTable()->deleteLocation($id);
                return new \Zend\View\Model\JsonModel(
                        array('info' => 'Delete location success!', 'msgCode' => 'success'));
            }
        }
    }

//    
    public function insertAction() {
        $form = new \Restful\Form\LocationForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $location = new \Restful\Model\CatLocation();
            $form->setInputFilter($location->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $location->exchangeArray($form->getData());
                $this->getCatLocationTable()->saveCatLocation($location);
                return new \Zend\View\Model\JsonModel(
                        array('info' => 'Insert location success!', 'msgCode' => 'success'));
            } else {
                return new \Zend\View\Model\JsonModel(
                        array('error' => $form->getMessages(), 'msgCode' => 'fail'));
            }
        }
    }

    public function preUpdateAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $id = (int) $request->getPost('locationId');
            if (!$id) {
                return new \Zend\View\Model\JsonModel(
                        array('error' => 'Not found record', 'msgCode' => 'fail'));
            } else {
                try {
                    $location = $this->getCatLocationTable()->getCatLocationById($id);
                    return new \Zend\View\Model\JsonModel(
                            array('locationItem' => $location, 'msgCode' => 'success',
                        'parentLocation' => $this->getCatLocationTable()->getLocationParent()));
                } catch (Exception $ex) {
                    return new \Zend\View\Model\JsonModel(
                            array('error' => $ex, 'msgCode' => 'fail'));
                }
            }
        }
    }

//    
    public function updateAction() {
        $form = new \Restful\Form\LocationForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $location = new \Restful\Model\CatLocation();
            $form->setInputFilter($location->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $location->exchangeArray($form->getData());
                $this->getCatLocationTable()->saveCatLocation($location);
                return new \Zend\View\Model\JsonModel(
                        array('info' => 'Update location success!', 'msgCode' => 'success'));
            } else {
                return new \Zend\View\Model\JsonModel(
                        array('error' => $form->getMessages(), 'msgCode' => 'fail'));
            }
        }
    }

    public function getCatLocationTable() {
        if (!$this->catLocationTable) {
            $sm = $this->getServiceLocator();
            $this->catLocationTable = $sm->get('Restful\Model\CatLocationTable');
        }

        return $this->catLocationTable;
    }

}
