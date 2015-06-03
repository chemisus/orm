<?php

namespace Chemisus\Database\Jql;

class AbstractField
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

    public function field()
    {
        return $this->field;
    }
}
