<?php

namespace AnthonyBocci\Encryption;

/**
 * @class Rot13
 * Extends Caesar to use a 13 shift
 */
class Rot13 extends Caesar
{
    /**
     * Constructor
     * Call Caesar constructor
     */
    public function __construct()
    {
        parent::__construct(13);
    }
}
