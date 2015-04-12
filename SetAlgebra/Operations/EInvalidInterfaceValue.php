<?php

namespace SetAlgebra\Operations;

/**
 * Class EInvalidInterfaceValue
 * @package SetAlgebra\Operations
 */
class EInvalidInterfaceValue extends \Exception {

    public function __construct(){
        parent::__construct("The interface name must be a string.");
    }
} 