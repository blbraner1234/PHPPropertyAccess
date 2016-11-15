<?php

namespace teleiosis\PropertyAccess\traits;


use teleiosis\PropertyAccess\lib\ParseAnnotations;

trait PropertyAccess
{

    public function __set($name, $value)
    {
        if(method_exists($this, $name) && $this->checkAnnotations($name, 'property')){
            return $this->$name($name, $value);
        }
        return $this->$name = $value;
    }

    public function __get($name)
    {
        if(method_exists($this, $name) && $this->checkAnnotations($name, 'property')){
            return $this->$name();
        }
        return $this->$name;
    }

    public function __isset($name)
    {
        if(method_exists($this, $name) && $this->checkAnnotations($name, 'property')){
            $isset = false;
            $isset = isset($this->$name);
             if($isset == false){
                 $isset = $this->$name();
             }
            return $isset;
        }

        return isset($this->$name);

    }


    public function checkAnnotations($methodName, $propertyName)
    {
        $annotation = new ParseAnnotations();
        return $annotation->checkAnnotationExists(get_called_class(), $methodName, $propertyName);
    }

}