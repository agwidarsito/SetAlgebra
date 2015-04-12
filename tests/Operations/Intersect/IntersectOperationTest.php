<?php

namespace Tests\Operations\Intersect;

use SetAlgebra\Operations\Intersect\IntersectOperation;

interface IIntersectable{

    public function getBoolean();
}

class PositiveResult implements IIntersectable{

    public function getBoolean(){
        return TRUE;
    }
}

class NegativeResult implements IIntersectable{

    public function getBoolean(){
        return FALSE;
    }
}

class IntersectOperationTest extends \PHPUnit_Framework_TestCase{

    public function test_can_instantiate_correctly(){
        $instance = new IntersectOperation("Some interface");
        $this->assertNotNull($instance);
    }

    public function test_intersect_all_positive_1_works_correctly(){
        $instance = new IntersectOperation("Tests\\Operations\\Intersect\\IIntersectable");
        $instance->addElement(new PositiveResult());
        $this->assertEquals(TRUE, $instance->getBoolean());
    }

    public function test_intersect_all_positive_2_works_correctly(){
        $instance = new IntersectOperation("Tests\\Operations\\Intersect\\IIntersectable");
        $instance->addElement(new PositiveResult());
        $instance->addElement(new PositiveResult());
        $this->assertEquals(TRUE, $instance->getBoolean());
    }

    public function test_intersect_all_negative_1_works_correctly(){
        $instance = new IntersectOperation("Tests\\Operations\\Intersect\\IIntersectable");
        $instance->addElement(new NegativeResult());
        $this->assertEquals(FALSE, $instance->getBoolean());
    }

    public function test_intersect_all_negative_2_works_correctly(){
        $instance = new IntersectOperation("Tests\\Operations\\Intersect\\IIntersectable");
        $instance->addElement(new NegativeResult());
        $instance->addElement(new NegativeResult());
        $this->assertEquals(FALSE, $instance->getBoolean());
    }

    public function test_intersect_positive_negative_works_correctly(){
        $instance = new IntersectOperation("Tests\\Operations\\Intersect\\IIntersectable");
        $instance->addElement(new NegativeResult());
        $instance->addElement(new PositiveResult());
        $this->assertEquals(FALSE, $instance->getBoolean());
    }

    public function test_intersect_no_elements_works_correctly(){
        $instance = new IntersectOperation("Tests\\Operations\\Intersect\\IIntersectable");
        $this->assertEquals(FALSE, $instance->getBoolean());
    }

}