<?php

namespace Chemisus\Database\Query;

use Chemisus\Container\Container;

class AbstractInsertQuery
{
    /**
     * @var string
     */
    private $table;

    /**
     * @var Container
     */
    private $fields;

    /**
     * @var Container
     */
    private $values;

    /**
     * AbstractInsertQuery constructor.
     * @param string $table
     * @param Container $fields
     * @param Container $values
     */
    public function __construct($table, Container $fields, Container $values)
    {
        $this->table = $table;
        $this->fields = $fields;
        $this->values = $values;
    }

    /**
     * @return string
     */
    public function table()
    {
        return $this->table;
    }

    /**
     * @return Container
     */
    public function fields()
    {
        return $this->fields;
    }

    /**
     * @return Container
     */
    public function values()
    {
        return $this->values;
    }
}