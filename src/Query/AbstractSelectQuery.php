<?php

namespace Chemisus\Database\Query;

use Chemisus\Container\Container;

class AbstractSelectQuery
{
    /**
     * @var Container
     */
    private $fields;

    /**
     * @var Container
     */
    private $from;

    /**
     * @var Container
     */
    private $where;

    /**
     * @var Container
     */
    private $group;

    /**
     * @var Container
     */
    private $having;

    /**
     * @var Container
     */
    private $order;

    /**
     * @var int
     */
    private $limit;

    /**
     * AbstractSelectQuery constructor.
     * @param Container $fields
     * @param Container $from
     * @param Container $where
     * @param Container $group
     * @param Container $having
     * @param Container $order
     * @param int $limit
     */
    public function __construct(Container $fields, Container $from, Container $where, Container $group, Container $having, Container $order, $limit)
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
     * @return Container
     */
    public function fields()
    {
        return $this->fields;
    }

    /**
     * @return Container
     */
    public function from()
    {
        return $this->from;
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
    public function group()
    {
        return $this->group;
    }

    /**
     * @return Container
     */
    public function having()
    {
        return $this->having;
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
