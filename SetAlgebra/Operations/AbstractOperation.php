<?php

namespace SetAlgebra\Operations;

/**
 * Class AbstractOperation
 * @package SetAlgebra\Operations
 */
abstract class AbstractOperation {

    /**
     * @var string
     */
    protected $interface;

    /**
     * @var array
     */
    protected $elements = [];

    public function __construct($interface){
        if (!is_string($interface)){
            throw new EInvalidInterfaceValue();
        }
        $this->interface = $interface;
    }

    public function addElement($element){
        if (($element instanceof $this->interface)
            || ($element instanceof AbstractOperation && $element->getInterface() == $this->getInterface())){

            $this->elements[] = $element;
        }else{
            throw new EInvalidType($this->interface);
        }
    }

    public function removeElement($element){
        $newItems = array();
        foreach($this->elements as $anItem){
            if ($anItem !== $element){
                $newItems[] = $anItem;
            }
        }
        $this->elements = $newItems;
    }

    public function exists($element){
        foreach($this->elements as $anItem){
            if ($anItem === $element){
                return TRUE;
            }
        }
        return FALSE;
    }

    public function cardinality(){
        return count($this->elements);
    }

    public function getInterface(){
        return $this->interface;
    }
} 