<?php

namespace Chemisus\Database;

class AbstractSelectQuery
{
    private $fields;
    private $from;
    private $where;
    private $group;
    private $having;
    private $order;
    private $limit;

    /**
     * AbstractSelectQuery constructor.
     * @param $fields
     * @param $from
     * @param $where
     * @param $group
     * @param $having
     * @param $order
     * @param $limit
     */
    public function __construct($fields, $from, $where, $group, $having, $order, $limit)
    {
        $this->fields = $fields;
        $this->from = $from;
        $this->where = $where;
        $this->group = $group;
        $this->having = $having;
        $this->order = $order;
        $this->limit = $limit;
    }

    /**
     * @return mixed
     */
    public function fields()
    {
        return $this->fields;
    }

    /**
     * @return mixed
     */
    public function from()
    {
        return $this->from;
    }

    /**
     * @return mixed
     */
    public function where()
    {
        return $this->where;
    }

    /**
     * @return mixed
     */
    public function group()
    {
        return $this->group;
    }

    /**
     * @return mixed
     */
    public function having()
    {
        return $this->having;
    }

    /**
     * @return mixed
     */
    public function order()
    {
        return $this->order;
    }

    /**
     * @return mixed
     */
    public function limit()
    {
        return $this->limit;
    }
}