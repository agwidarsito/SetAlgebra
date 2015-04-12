<?php

namespace SetAlgebra\Operations\Union;

use SetAlgebra\Operations\AbstractOperation;
use SetAlgebra\Operations\EInvalidMethod;

/**
 * Class UnionOperation
 * @package SetAlgebra\Operations\Union
 */
class UnionOperation extends AbstractOperation{

    public function __call($method, $arguments) {
        if (!method_exists($this->interface, $method)) {
            throw new EInvalidMethod($method);
        }

        if (!$this->elements) {
            return false;
        }

        foreach ($this->elements as $element) {
            if (call_user_func_array(array($element, $method), $arguments)) {
                return true;
            }
        }
        return false;
    }

} 