<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restful\Controller;

/**
 * Description of UserController
 *
 * @author MageBay
 */
class UserController extends \Zend\Mvc\Controller\AbstractRestfulController {

    protected $userInfoTable;
    protected $sysUsersTable;
    protected $catLocationTable;

    //put your code here
    public function indexAction() {
        return new \Zend\View\Model\JsonModel(array(
            'user' => $this->getUserInfoTable()->fetchAll(),
            'msgCode' => 'success',
        ));
    }

    public function deleteAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $id = (int) $request->getPost('userId');
            if (!$id) {
                return new \Zend\View\Model\JsonModel(
                        array('error' => 'Not found record', 'msgCode' => 'fail'));
            } else {
                $table = $this->getUserInfoTable()->getUserById($id);
                if (!$table) {
                    return new \Zend\View\Model\JsonModel(
                            array('error' => 'Not found record', 'msgCode' => 'fail'));
                }
                //xoa trong bang user_info
                $this->getUserInfoTable()->deleteUser($id);
                //xoa trong bang sys_users
                $this->getSysUsersTable()->deleteUser($id);

                return new \Zend\View\Model\JsonModel(
                        array('info' => 'Delete user success!', 'msgCode' => 'success'));
            }
        }
    }

    public function insertAction() {
        $form = new \Restful\Form\UsersForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            $userInfo = new \Restful\Model\UserInfo();
            $form->setInputFilter($userInfo->getInputFilter());
            if ($form->isValid()) {
                $userInfo->exchangeArray($form->getData());
                if ($this->getSysUsersTable()->getUserByUsername($userInfo->getUsername())) {
                    return new \Zend\View\Model\JsonModel(
                            array('error' => 'Username alreadly!', 'msgCode' => 'fail'));
                }
                $userId = $this->getSysUsersTable()->saveSysUsers($userInfo);
                $userInfo->setUserId($userId);
                $this->getUserInfoTable()->saveSysUsers($userInfo);
                return new \Zend\View\Model\JsonModel(
                        array('info' => 'Insert User Success!', 'msgCode' => 'success'));
            } else {
                return new \Zend\View\Model\JsonModel(
                        array('error' => $form->getMessages(), 'msgCode' => 'fail'));
            }
        }
    }

    public function preUpdateAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $id = (int) $request->getPost('userId');
            if (!$id) {
                return new \Zend\View\Model\JsonModel(
                        array('error' => 'Not found record', 'msgCode' => 'fail'));
            } else {
                try {
                    $userInfo = $this->getUserInfoTable()->getArrayUserById($id);
                    return new \Zend\View\Model\JsonModel(
                            array('userItem' => $userInfo, 'msgCode' => 'success',
                        'national' => $this->getCatLocationTable()->getLocationParent()));
                } catch (Exception $ex) {
                    return new \Zend\View\Model\JsonModel(
                            array('error' => $ex, 'msgCode' => 'fail'));
                }
            }
        }
    }

    public function updateAction() {
        $form = new \Restful\Form\UsersForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            $userInfo = new \Restful\Model\UserInfo();
            $form->setInputFilter($userInfo->getInputFilter());
            if ($form->isValid()) {
                $userInfo->exchangeArray($form->getData());
                $userId = $this->getSysUsersTable()->saveSysUsers($userInfo);
                $this->getUserInfoTable()->saveSysUsers($userInfo);
                return new \Zend\View\Model\JsonModel(
                        array('info' => 'Update User Success!', 'msgCode' => 'success'));
            }else {
                return new \Zend\View\Model\JsonModel(
                        array('error' => $form->getMessages(), 'msgCode' => 'fail'));
            }
        }
    }

    public function getUserInfoTable() {
        if (!$this->userInfoTable) {
            $sm = $this->getServiceLocator();
            $this->userInfoTable = $sm->get('Restful\Model\UserInfoTable');
        }

        return $this->userInfoTable;
    }

    public function getSysUsersTable() {
        if (!$this->sysUsersTable) {
            $sm = $this->getServiceLocator();
            $this->sysUsersTable = $sm->get('Restful\Model\SysUserTable');
        }

        return $this->sysUsersTable;
    }

    public function getCatLocationTable() {
        if (!$this->catLocationTable) {
            $sm = $this->getServiceLocator();
            $this->catLocationTable = $sm->get('Restful\Model\CatLocationTable');
        }
        return $this->catLocationTable;
    }

}
