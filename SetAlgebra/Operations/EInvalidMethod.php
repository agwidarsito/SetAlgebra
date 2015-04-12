<?php

namespace SetAlgebra\Operations;

/**
 * Class EInvalidMethod
 * @package SetAlgebra\Operations
 */
class EInvalidMethod extends \Exception {

    public function __construct($method){
        parent::__construct("Method '$method' is not defined on the interface.");
    }
} 