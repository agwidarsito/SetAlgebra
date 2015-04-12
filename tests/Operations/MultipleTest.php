<?php

namespace Tests\Operations;

use SetAlgebra\Operations\Union\UnionOperation;

interface IResponse{

    public function getBoolean();
}

class PositiveResult implements IResponse{

    public function getBoolean(){
        return TRUE;
    }
}

class NegativeResult implements IResponse{

    public function getBoolean(){
        return FALSE;
    }
}

class MultipleTest extends \PHPUnit_Framework_TestCase{

    public function test_union_with_union(){
        $unionA = new UnionOperation("Tests\Operations\IResponse");
        $unionB = new UnionOperation("Tests\Operations\IResponse");

        $unionA->addElement(new PositiveResult());
        $unionB->addElement(new PositiveResult());

        $unionB->addElement($unionA);
        $this->assertEquals(TRUE, $unionB->getBoolean());
    }

}