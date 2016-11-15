<?php

namespace teleiosis\PropertyAccess\traits;


use teleiosis\PropertyAccess\lib\ParseAnnotations;

trait PropertyAccess
{

    public function __set($name, $value)
    {
        $annotation = new ParseAnnotations();

        $isProperty = $annotation->checkAnnotationExists(get_called_class(), $name, 'property');

        if(method_exists($this, $name) && $isProperty){
            return $this->$name($name, $value);
        }
    }

    public function __get($name)
    {
        $annotation = new ParseAnnotations();

        $isProperty = $annotation->checkAnnotationExists(get_called_class(), $name, 'property');

        if(method_exists($this, $name) && $isProperty){
            return $this->$name();
        }
        return $this->$name;
    }

}