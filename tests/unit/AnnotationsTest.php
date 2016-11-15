<?php

use teleiosis\PropertyAccess\lib\ParseAnnotations;

class AnnotationsTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function it_can_parse_a_methods_annotations()
    {
        $annotations = new ParseAnnotations();

        $propertyAnnotationExists = $annotations->checkAnnotationExists('TestClass', 'testMethod', 'property');
        $noExistantAnnotation     = $annotations->checkAnnotationExists('TestClass', 'testMethod', 'nonexistant');

        $this->assertTrue($propertyAnnotationExists);
        $this->assertFalse($noExistantAnnotation);
    }

}
