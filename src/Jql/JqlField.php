<?php

namespace Chemisus\Database\Jql;

class JqlField
{
    /**
     * @var string
     */
    private $field;

    /**
     * @param string $field
     */
    public function __construct($field)
    {
        $this->field = $field;
    }
}
