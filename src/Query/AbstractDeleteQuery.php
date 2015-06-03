<?php

namespace Chemisus\Database\Query;

use Chemisus\Container\ArrayContainer;
use Chemisus\Container\Container;

class AbstractDeleteQuery
{
    /**
     * @var string
     */
    private $table;

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
     * AbstractDeleteQuery constructor.
     * @param string $table
     * @param Container $where
     * @param Container $order
     * @param int $limit
     */
    public function __construct($table, Container $where = null, Container $order = null, $limit)
    {
        $this->table = $table;
        $this->where = $where ?: new ArrayContainer();
        $this->order = $order ?: new ArrayContainer();
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
    public function where()
    {
        return $this->where;
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