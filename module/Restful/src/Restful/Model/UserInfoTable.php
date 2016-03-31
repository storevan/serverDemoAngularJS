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
use Zend\Db\Sql\Select;

class UserInfoTable extends AbstractTableGateway{
    
    protected $table = "users_info";
 
    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
    }
    
 
    public function fetchAll() {
        $select = new Select();
        $select ->from('sys_users')
                ->join(array('b'=>'users_info'), 'sys_users.user_id=b.user_id',array('about'=>'about',
                    'email'=>'email',
                    'facebook'=>'facebook',
                    'firstName'=>'first_name',
                    'homeAddress'=>'home_address',
                    'lastName'=>'last_name',
                    'other'=>'other',
                    'twitter'=>'twitter',
                    'website'=>'website',
                    'zipCode'=>'zip_code',
                    ),'left')
                ->join(array('c'=>'cat_location'), 'b.national=c.location_id',array('nationalName'=>'location_name'),'left')
                ->join(array('d'=>'cat_location'), 'b.province=d.location_id',array('provinceName'=>'location_name'),'left');
        $select->order('sys_users.username ASC');
         $resultSet = $this->selectWith($select);
 
        $entities = array();
        foreach ($resultSet as $row) {
            $entity = new UserInfo();
            $entity->setAbout($row->about);
            $entity->setEmail($row->email);
            $entity->setFacebook($row->facebook);
            $entity->setFirstName($row->firstName);
            $entity->setHomeAddress($row->homeAddress);
            $entity->setLastName($row->lastName);
            $entity->setNationalName($row->nationalName);
            $entity->setOther($row->other);
            $entity->setPassword($row->password);
            $entity->setProvinceName($row->provinceName);
            $entity->setRole($row->role);
            $entity->setTwitter($row->twitter);
            $entity->setUserId($row->user_id);
            $entity->setUsername($row->username);
            $entity->setWebsite($row->website);
            $entity->setZipCode($row->zipCode);
            $entities[] = $entity;
        }
        return $entities;
    }
 
    public function getUserById($id) {
        $select = new Select();
        $select ->from('sys_users')
                ->join(array('b'=>'users_info'), 'sys_users.user_id=b.user_id',array('about'=>'about',
                    'email'=>'email',
                    'facebook'=>'facebook',
                    'firstName'=>'first_name',
                    'homeAddress'=>'home_address',
                    'lastName'=>'last_name',
                    'other'=>'other',
                    'twitter'=>'twitter',
                    'website'=>'website',
                    'zipCode'=>'zip_code',
                    'national'=>'national',
                    'province'=>'province',
                    ),'left')
                ->join(array('c'=>'cat_location'), 'b.national=c.location_id',array('nationalName'=>'location_name'),'left')
                ->join(array('d'=>'cat_location'), 'b.province=d.location_id',array('provinceName'=>'location_name'),'left')
                ->where(array('sys_users.user_id'=>$id));
        $select->order('sys_users.username ASC');
        $row = $this->selectWith($select)->current();
 
        if (!$row) {
            return false;
        }

        $userInfo = new UserInfo();
        $userInfo->setAbout($row->about);
        $userInfo->setEmail($row->email);
        $userInfo->setFacebook($row->facebook);
        $userInfo->setFirstName($row->firstName);
        $userInfo->setHomeAddress($row->homeAddress);
        $userInfo->setLastName($row->lastName);
        $userInfo->setOther($row->other);
        $userInfo->setTwitter($row->twitter);
        $userInfo->setUserId($row->user_id);
        $userInfo->setWebsite($row->website);
        $userInfo->setZipCode($row->zipCode);
        $userInfo->setUsername($row->username);
        $userInfo->setNational($row->national);
        $userInfo->setProvince($row->province);

        return $userInfo;
    }
    
    public function getArrayUserById($id) {
        $select = new Select();
        $select ->from('sys_users')
                ->join(array('b'=>'users_info'), 'sys_users.user_id=b.user_id',array('about'=>'about',
                    'email'=>'email',
                    'facebook'=>'facebook',
                    'firstName'=>'first_name',
                    'homeAddress'=>'home_address',
                    'lastName'=>'last_name',
                    'other'=>'other',
                    'twitter'=>'twitter',
                    'website'=>'website',
                    'zipCode'=>'zip_code',
                    'national'=>'national',
                    'province'=>'province',
                    ),'left')
                ->join(array('c'=>'cat_location'), 'b.national=c.location_id',array('nationalName'=>'location_name'),'left')
                ->join(array('d'=>'cat_location'), 'b.province=d.location_id',array('provinceName'=>'location_name'),'left')
                ->where(array('sys_users.user_id'=>$id));
        $select->order('sys_users.username ASC');
        $resultSet = $this->selectWith($select);
        $entities = array();
        foreach ($resultSet as $row) {
        $entity = new UserInfo();
        $entity->setRole($row->role);
        $entity->setAbout($row->about);
        $entity->setEmail($row->email);
        $entity->setFacebook($row->facebook);
        $entity->setFirstName($row->firstName);
        $entity->setHomeAddress($row->homeAddress);
        $entity->setLastName($row->lastName);
        $entity->setOther($row->other);
        $entity->setTwitter($row->twitter);
        $entity->setUserId($row->user_id);
        $entity->setWebsite($row->website);
        $entity->setZipCode($row->zipCode);
        $entity->setUsername($row->username);
        $entity->setNational($row->national);
        $entity->setProvince($row->province);
        $entities[] = $entity;
        }
        return $entities;
    }
    
    public function getUserInfoById($id) {
        $row = $this->select(array('user_id' => (int) $id))->current();
 
        if (!$row) {
            return false;
        }

        $userInfo = new UserInfo();
        $userInfo->setAbout($row->about);
        $userInfo->setEmail($row->email);
        $userInfo->setFacebook($row->facebook);
        $userInfo->setFirstName($row->first_name);
        $userInfo->setHomeAddress($row->home_address);
        $userInfo->setLastName($row->last_name);
        $userInfo->setOther($row->other);
        $userInfo->setTwitter($row->twitter);
        $userInfo->setUserId($row->user_id);
        $userInfo->setWebsite($row->website);
        $userInfo->setZipCode($row->zip_code);
        $userInfo->setNational($row->national);
        $userInfo->setProvince($row->province);

        return $userInfo;
    }
 
    public function saveSysUsers(UserInfo $userInfo) {
        $data = array(
            'user_id' => $userInfo->getUserId(),
            'first_name' => $userInfo->getFirstName(),
            'last_name' => $userInfo->getLastName(),
            'email' => $userInfo->getEmail(),
            'national' => $userInfo->getNational(),
            'province' => $userInfo->getProvince(),
            'home_address' => $userInfo->getHomeAddress(),
            'zip_code' => $userInfo->getZipCode(),
            'about' => $userInfo->getAbout(),
            'website' => $userInfo->getWebsite(),
            'facebook' => $userInfo->getFacebook(),
            'twitter' => $userInfo->getTwitter(),
            'other' => $userInfo->getOther(),
        ); 
        
        $id = (int) $userInfo->getUserId();
        if (!$this->getUserInfoById($id)) {
            if (!$this->insert($data)) {
                return false;
            }
            return $this->getLastInsertValue();
        } else {
            if (!$this->update($data, array('user_id' => $id))) {
                return false;
            }
            return true;
        } 
    }
 
    public function deleteUser($id) {
        return $this->delete(array('user_id' => (int) $id));
    }
    
}
