<?php
namespace Common\Model;

interface ModelInterface {

    /**
     * Array of Doctrine Objects
     *
     * @param array $objects
     * @return mixed
     */
    public function getList(array $objects);

    /**
     * Doctrine Object
     *
     * @param $object
     * @return mixed
     */
    public function get($object);

}
