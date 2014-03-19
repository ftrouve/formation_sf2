<?php

namespace Trouve\BlogBundle\Entity;

use Doctrine\Common\Util;

abstract class AbstractEntity
{
    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->setData($data);
        }
    }

    public function __get($key)
    {
        $key = $this->underscore($key);

        return $this->$key;
    }

    public function __set($key, $value)
    {
        $key = $this->underscore($key);
        $this->$key = $value;

        return $this;
    }

    public function __call($method, $args)
    {
        if (empty($args) && property_exists($this, $method)) {
            return $this->$method;
        }

        switch (substr($method, 0, 3)) {
            case 'get':
                $key = lcfirst(substr($method, 3));
                return $this->$key;

            case 'set':
                $key = lcfirst(substr($method, 3));
                $this->$key = isset($args[0]) ? $args[0] : null;
                return $this;
        }

        throw new \Exception("Invalid method " . get_class($this). "::" . $method . "(" . print_r($args, 1) . ")");
    }

    public function __toString()
    {
        $attrs = array('name', 'title', 'id');
        foreach ($attrs as $attr) {
            if (property_exists($this, $attr)) {
                return $this->$attr;
            }
        }

        throw new \Exception("Could not find a valid attribute for __toString() method of object (" . get_class($this) . ")");
    }

    public function setData($data)
    {
        foreach ($data as $key => $value) {
            $property = $this->camelcase($key);
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }

        return $this;
    }

    public function toArray()
    {
        $result = array();
        $vars = array_keys(get_object_vars($this));
        foreach ($vars as $var) {
            $result[$this->underscore($var)] = $this->$var;
        }

        return $result;
    }

    protected function camelcase($str)
    {
        $result = Util\Inflector::camelize($str);

        return $result;
    }

    protected function underscore($str)
    {
        $result = Util\Inflector::tableize($str);

        return $result;
    }
}