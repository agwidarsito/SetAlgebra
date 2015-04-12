<?php

namespace Tests\Operations;

use SetAlgebra\Operations\AbstractOperation;

class AbstractOperationExposure extends AbstractOperation{

}

class TestElement{

}

class NotATestElement{

}

class AbstractOperationTest extends \PHPUnit_Framework_TestCase{

    public function test_can_instantiate_correctly(){
        $instance = new AbstractOperationExposure("Some interface");
        $this->assertNotNull($instance);
    }

    /**
     * @expectedException \SetAlgebra\Operations\EInvalidInterfaceValue
     */
    public function test_wrong_interface_type_throws_exception(){
        $instance = new AbstractOperationExposure(new TestElement());
        $this->assertNotNull($instance);
    }

    public function test_can_add_interface_element(){
        $instance = new AbstractOperationExposure("Tests\\Operations\\TestElement");
        $instance->addElement(new TestElement());
        $this->assertNotNull($instance);
    }

    /**
     * @expectedException \SetAlgebra\Operations\EInvalidType
     */
    public function test_invalid_addition_throws_exception(){
        $instance = new AbstractOperationExposure("Tests\\Operations\\TestElement");
        $instance->addElement(new NotATestElement());
        $this->assertNotNull($instance);
    }

    public function test_cardinality_at_zero(){
        $instance = new AbstractOperationExposure("Tests\\Operations\\TestElement");
        $this->assertEquals(0, $instance->cardinality());
    }

    public function test_cardinality_at_one(){
        $instance = new AbstractOperationExposure("Tests\\Operations\\TestElement");
        $instance->addElement(new TestElement());
        $this->assertEquals(1, $instance->cardinality());
    }

    public function test_cardinality_at_two(){
        $instance = new AbstractOperationExposure("Tests\\Operations\\TestElement");
        $instance->addElement(new TestElement());
        $instance->addElement(new TestElement());
        $this->assertEquals(2, $instance->cardinality());
    }

    public function test_can_remove_valid_instance(){
        $instance = new AbstractOperationExposure("Tests\\Operations\\TestElement");
        $el = new TestElement();

        $instance->addElement($el);
        $instance->removeElement($el);
        $this->assertEquals(0, $instance->cardinality());
    }

    public function test_can_remove_invalid_instance(){
        $instance = new AbstractOperationExposure("Tests\\Operations\\TestElement");
        $el = new TestElement();

        $instance->removeElement($el);
        $this->assertEquals(0, $instance->cardinality());
    }
}