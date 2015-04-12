<?php

namespace SetAlgebra\Operations;

/**
 * Class EInvalidType
 * @package SetAlgebra\Operations
 */
class EInvalidType extends \Exception {

    public function __construct($type){
        parent::__construct("Set elements must be of type '$type'");
    }
} 