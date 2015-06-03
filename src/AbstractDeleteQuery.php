<?php

namespace Chemisus\Database;

class AbstractDeleteQuery
{
    private $table;
    private $where;
    private $order;
    private $limit;

    /**
     * AbstractDeleteQuery constructor.
     * @param $table
     * @param $where
     * @param $order
     * @param $limit
     */
    public function __construct($table, $where, $order, $limit)
    {
        $this->table = $table;
        $this->where = $where;
        $this->order = $order;
        $this->limit = $limit;
    }

    public function table()
    {
        return $this->table;
    }

    public function where()
    {
        return $this->where;
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