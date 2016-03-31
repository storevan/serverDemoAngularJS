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

class CatLocationTable extends AbstractTableGateway {

    protected $table = "cat_location";

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
    }

    public function fetchAll() {
        $select = new Select();
        $select->from('cat_location')
                ->join(array('b' => 'cat_location'), 'cat_location.parent_id=b.location_id', array('parent_name' => 'location_name'), 'left');
        $select->order('cat_location.parent_id ASC');
        $resultSet = $this->selectWith($select);

        $entities = array();
        foreach ($resultSet as $row) {
            $entity = new CatLocation();
            $entity->setLocationId($row->location_id);
            $entity->setLocationName($row->location_name);
            $entity->setParentId($row->parent_id);
            $entity->setParentName($row->parent_name);
            $entities[] = $entity;
        }
        return $entities;
    }

    public function getCatLocationById($id) {
        $row = $this->select(array('location_id' => (int) $id))->current();

        if (!$row) {
            return false;
        }
        $entities = array();
        $catLocation = new CatLocation();
        $catLocation->setLocationId($row->location_id);
        $catLocation->setLocationName($row->location_name);
        $catLocation->setParentId($row->parent_id);
        $entities[] = $catLocation;
        return $entities;
    }

    public function saveCatLocation(CatLocation $location) {
        $data = array(
            'location_name' => $location->getLocationName(),
            'parent_id' => $location->getParentId(),
        );

        $id = (int) $location->getLocationId();

        if ($id == 0) {
            if (!$this->insert($data)) {
                return false;
            }

            return $this->getLastInsertValue();
        } elseif ($this->getCatLocationById($id)) {
            if (!$this->update($data, array('location_id' => $id))) {
                return false;
            }

            return true;
        } else {
            return false;
        }
    }

    public function deleteLocation($id) {
        return $this->delete(array('location_id' => (int) $id));
    }

    public function getCatLocationByParentId($id) {
        $row = $this->select(array('parent_id' => (int) $id))->current();

        if (!$row) {
            return false;
        }

        $catLocation = new CatLocation(array(
            'locationId' => $row->location_id,
            'locationName' => $row->location_name,
            'parentId' => $row->parent_id,
        ));

        return $catLocation;
    }

    public function deleteLocationByParentId($parentId) {
        return $this->delete(array('parent_id' => (int) $parentId));
    }

    public function getLocationParent() {
        $select = new Select();
        $select->from('cat_location')
                ->where('parent_id is null');
        $select->order('cat_location.location_name ASC');
        $resultSet = $this->selectWith($select);
        $entities = array();
        $entity = new CatLocation();
        $entity->setLocationId('-1');
        $entity->setLocationName('--Choose--');
        $entities[] = $entity;
        foreach ($resultSet as $row) {
            $entity = new CatLocation();
            $entity->setLocationId($row->location_id);
            $entity->setLocationName($row->location_name);
            $entities[] = $entity;
        }
        return $entities;
    }

    public function getSelectCatLocationByParentId($id) {
        $resultSet = $this->select(array('parent_id' => (int) $id));

        $entities = array();
        $entity = new CatLocation();
        $entity->setLocationId('-1');
        $entity->setLocationName('--Choose--');
        $entities[] = $entity;
        foreach ($resultSet as $row) {
            $entity = new CatLocation();
            $entity->setLocationId($row->location_id);
            $entity->setLocationName($row->location_name);
            $entities[] = $entity;
        }
        return $entities;
    }

}
