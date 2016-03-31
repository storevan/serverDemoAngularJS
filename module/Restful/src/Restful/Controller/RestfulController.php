<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Restful\Controller;

class RestfulController extends \Zend\Mvc\Controller\AbstractRestfulController {

    protected $sysUsersTable;

    public function indexAction() {
        $request = $this->getRequest();
        $username = $request->getPost('username');
        $password = $request->getPost('password');

        $user = new \Restful\Model\SysUsers();
        $user->setUsername($username);
        $user->setPassword($password);
        $userBO = $this->getSysUsersTable()->getUserByUser($user);
        if (!$userBO) {
            return new \Zend\View\Model\JsonModel(
                    array(
                'error' => 'Username or password not valid!', 'msgCode' => 'fail')
            );
        } else {
            return new \Zend\View\Model\JsonModel(
                    array(
                'info' => 'Authen success!', 'msgCode' => 'success'));
        };
    }

    public function registerAction() {
        $form = new \Restful\Form\SignUpForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            $signupForm = new \Restful\Model\SignUp();
            $form->setInputFilter($signupForm->getInputFilter());
            if ($form->isValid()) {
                $signupForm->exchangeArray($form->getData());
                if ($this->getSysUsersTable()->getUserByUsername($signupForm->getUsername())) {
                    return new \Zend\View\Model\JsonModel(
                            array('error' => 'Username alreadly!', 'msgCode' => 'fail'));
                }
                $this->getSysUsersTable()->saveSysUsersSignup($signupForm);
                return new \Zend\View\Model\JsonModel(
                        array(
                    'info' => 'Create account success!', 'msgCode' => 'success'));
            } else {
                return new \Zend\View\Model\JsonModel(
                        array('error' => $form->getMessages(), 'msgCode' => 'fail'));
            }
        }
    }

    public function changepassAction() {
        $form = new \Restful\Form\ChangePassForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            $changePass = new \Restful\Model\ChangePass();
            $form->setInputFilter($changePass->getInputFilter());
            if ($form->isValid()) {
                $changePass->exchangeArray($form->getData());
                $user = new \Restful\Model\SysUsers();
                $user->setUsername($changePass->getUsername());
                $user->setPassword($changePass->getOldPassword());
                $userBO = $this->getSysUsersTable()->getUserByUser($user);
                if (!$userBO) {
                    return new \Zend\View\Model\JsonModel(
                            array('error' => 'Username or password not valid!', 'msgCode' => 'fail'));
                }
                $this->getSysUsersTable()->saveSysUsersChangePass($changePass, $userBO->getUserId());
                return new \Zend\View\Model\JsonModel(
                        array(
                    'info' => 'Create password success!', 'msgCode' => 'success'));
            } else {
                return new \Zend\View\Model\JsonModel(
                        array('error' => $form->getMessages(), 'msgCode' => 'fail'));
            }
        }
    }

    public function getSysUsersTable() {
        if (!$this->sysUsersTable) {
            $sm = $this->getServiceLocator();
            $this->sysUsersTable = $sm->get('Restful\Model\SysUserTable');
        }

        return $this->sysUsersTable;
    }

}
