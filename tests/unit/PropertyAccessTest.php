<?php


class PropertyAccessTest extends PHPUnit_Framework_TestCase
{

    /**
     * @tes
     */
    public function it_can_set_nonexistant_property_via_function()
    {

        $person = new TestClass();

        //try to set a non existant property

        $person->first_name = 'John';
        $this->assertEquals('John', $person->first_name);

        $person->first_name = 'Mary';
        $this->assertEquals('Mary', $person->first_name);

    }

    /**
     * @test
     */
    public function it_can_update_dynamic_properties()
    {
        $person = new TestClass();

        $person->first_name = 'John';
        $person->last_name  = 'Doe';

        $this->assertEquals('John.Doe@email.com', $person->email);
    }
}