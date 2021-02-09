<?php

namespace mvc\model;

class Product
{
    private $id;
    private $name;
    private $cat;
    private $price;
    private $description;
    private $stock;


    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }

}