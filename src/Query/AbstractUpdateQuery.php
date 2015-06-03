<?php

namespace Chemisus\Database\Query;

use Chemisus\Container\Container;

class AbstractUpdateQuery
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
     * @var Container
     */
    private $where;
    /**
     * @var Container
     */
    private $order;
    /**
     * @var int
     */
    private $limit;

    /**
     * @param string $table
     * @param Container $fields
     * @param Container $values
     * @param Container $where
     * @param Container $order
     * @param int $limit
     */
    public function __construct($table, Container $fields, Container $values, Container $where, Container $order, $limit)
    {
        $this->table = $table;
        $this->fields = $fields;
        $this->values = $values;
        $this->where = $where;
        $this->order = $order;
        $this->limit = $limit;
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
    public function where()
    {
        return $this->where;
    }

    /**
     * @return Container
     */
    public function values()
    {
        return $this->values;
    }

    /**
     * @return Container
     */
    public function order()
    {
        return $this->order;
    }

    /**
     * @return int
     */
    public function limit()
    {
        return $this->limit;
    }
}