<?php

namespace Chemisus\Database;

class AbstractUpdateQuery
{
    private $table;
    private $fields;
    private $values;
    private $where;
    private $order;
    private $limit;

    /**
     * AbstractUpdateQuery constructor.
     * @param $table
     * @param $fields
     * @param $values
     * @param $where
     * @param $order
     * @param $limit
     */
    public function __construct($table, $fields, $values, $where, $order, $limit)
    {
        $this->table = $table;
        $this->fields = $fields;
        $this->values = $values;
        $this->where = $where;
        $this->order = $order;
        $this->limit = $limit;
    }

    public function table()
    {
        return $this->table;
    }

    public function fields()
    {
        return $this->fields;
    }

    public function where()
    {
        return $this->where;
    }

    public function values()
    {
        return $this->values;
    }

    public function order()
    {
        return $this->order;
    }

    public function limit()
    {
        return $this->limit;
    }
}