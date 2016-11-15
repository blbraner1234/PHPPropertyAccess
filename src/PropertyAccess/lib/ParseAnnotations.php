<?php

namespace teleiosis\PropertyAccess\lib;

use ReflectionClass;
use zpt\anno\Annotations;

class ParseAnnotations
{

    public $method;
    public $annotations;

    /**
     * @param $class
     * @param $method
     */
    public function getMethodAnnotations($class, $method)
    {
        $this->getClassMethod($class, $method);
        $this->annotations = new Annotations($this->method);
    }

    /**
     * @param $class
     * @param $method
     */
    public function getClassMethod($class, $method)
    {
        $classReflector = new ReflectionClass($class);
        $this->method = $classReflector->getMethod($method);
    }

    /**
     * @param $class
     * @param $method
     * @param $annotation
     *
     * @return mixed
     */
    public function checkAnnotationExists($class, $method, $annotation)
    {
        $this->getMethodAnnotations($class, $method);
        return $this->annotations->isAnnotatedWith($annotation);
    }

}