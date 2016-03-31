<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Restful\Model;

/**
 * Description of CatLocationTable
 *
 * @author MageBay
 */
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;

class SysUserTable extends AbstractTableGateway{
    
    protected $table = "sys_users";
 
    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
    }
    
    public function deleteUser($id) {
        return $this->delete(array('user_id' => (int) $id));
    }
    
    public function getUserById($id) {
        $row = $this->select(array('user_id' => (int) $id))->current();
 
        if (!$row) {
            return false;
        }

        $sysUser = new SysUsers();
        $sysUser->setUserId($row->user_id);
        $sysUser->setUsername($row->username);
        $sysUser->setPassword($row->password);
        $sysUser->setRole($row->role);
         
        return $sysUser;
    }
    
    public function getUserByUser(SysUsers $sysUsers) {
        $data = array(
            'username' => $sysUsers->getUsername(),
            'password' => md5($sysUsers->getPassword()),
        );
        
        $row = $this->select($data)->current();
 
        if (!$row) {
            return false;
        }

        $sysUser = new SysUsers();
        $sysUser->setUserId($row->user_id);
        $sysUser->setUsername($row->username);
        $sysUser->setPassword($row->password);
        $sysUser->setRole($row->role);
         
        return $sysUser;
    }
    
    public function getUserByUsername($username) {
        $data = array(
            'username' => $username,
        );
        $row = $this->select($data)->current();
 
        if (!$row) {
            return false;
        }

        $sysUser = new SysUsers();
        $sysUser->setUserId($row->user_id);
        $sysUser->setUsername($row->username);
        $sysUser->setPassword($row->password);
        $sysUser->setRole($row->role);
         
        return $sysUser;
    }
    
    
    
    public function saveSysUsers(UserInfo $sysUsers) {
        $data = array(
            'username' => $sysUsers->getUsername(),
            'password' => $sysUsers->getPassword(),
            'role' => $sysUsers->getRole(),
        );
 
        $id = (int) $sysUsers->getUserId();
 
        if ($id == 0) {
            if (!$this->insert($data)) {
                return false;
            }
            return $this->getLastInsertValue();
        } elseif ($this->getUserById($id)) {
            if (!$this->update($data, array('user_id' => $id))) {
                return false;
            }
            return true;
        } else {
            return false;
        }
    }
    public function saveSysUsersSignup(SignUp $signUpForm) {
        $data = array(
            'username' => $signUpForm->getUsername(),
            'password' => $signUpForm->getPassword(),
            'role' => '0',
        );

        if (!$this->insert($data)) {
            return false;
        }
        return $this->getLastInsertValue();
    }
    
    public function saveSysUsersChangePass(ChangePass $changePass,$id) {
        $data = array(
            'password' => $changePass->getPassword(),
        );
        if (!$this->update($data, array('user_id' => $id))) {
            return false;
        }
        return $this->getLastInsertValue();
    }

}
