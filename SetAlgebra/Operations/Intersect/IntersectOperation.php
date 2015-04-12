<?php

namespace SetAlgebra\Operations\Intersect;

use SetAlgebra\Operations\AbstractOperation;
use SetAlgebra\Operations\EInvalidMethod;

/**
 * Class IntersectOperation
 * @package SetAlgebra\Operations\Intersect
 */
class IntersectOperation extends AbstractOperation{

    public function __call($method, $arguments) {
        if (!method_exists($this->interface, $method)) {
            throw new EInvalidMethod($method);
        }

        if (!$this->elements) {
            return false;
        }

        foreach ($this->elements as $element) {
            if (!call_user_func_array(array($element, $method), $arguments)) {
                return false;
            }
        }
        return true;
    }

} 