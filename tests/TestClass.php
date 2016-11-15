<?php


use teleiosis\PropertyAccess\traits\PropertyAccess;

/**
 * Class TestClass
 * @classAnnotation
 */
class TestClass
{
    use PropertyAccess;

//    public $first_name;
//    public $last_name;

    /**
     * @property
     * @testAnnotation
     */
    public function testMethod()
    {

    }

    /**
     * @param $name
     * @param $value
     * @property
     */
    public function first_name($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * @param $name
     * @param $value
     * @property
     */
    public function last_name($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * @property
     * @param $name
     * @param $value
     * @return string
     */
    public function email()
    {
       return $this->first_name . '.' . $this->last_name . '@email.com';
    }


}