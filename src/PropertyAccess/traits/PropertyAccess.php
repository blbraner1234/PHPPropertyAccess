<?php

namespace teleiosis\PropertyAccess\traits;


use teleiosis\PropertyAccess\lib\ParseAnnotations;

trait PropertyAccess
{

    /**
     * Overwride __set method to pass to a method on current object that
     * is annotated with @property and has the same name as property
     * @param $name
     * @param $value
     *
     * @return mixed
     */
    public function __set($name, $value)
    {
        if(method_exists($this, $name) && $this->checkAnnotations($name, 'property')){
            return $this->$name($name, $value);
        }
        return $this->$name = $value;
    }

    /**
     * * Overwride __get method to pass to a method on current object that
     * is annotated with @property and has the same name as property
     *
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        if(method_exists($this, $name) && $this->checkAnnotations($name, 'property')){
            return $this->$name();
        }
        return $this->$name;
    }

    /**
     * * Overwride __isset method to pass to a method on current object that
     * is annotated with @property and has the same name as property
     * @param $name
     *
     * @return bool
     */
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


    /**
     * Method to check the annotations for the method and property name on
     * current called class
     * @param $methodName
     * @param $propertyName
     *
     * @return mixed
     */
    public function checkAnnotations($methodName, $propertyName)
    {
        $annotation = new ParseAnnotations();
        return $annotation->checkAnnotationExists(get_called_class(), $methodName, $propertyName);
    }

}