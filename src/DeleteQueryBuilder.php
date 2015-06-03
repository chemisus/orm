<?php

namespace Chemisus\Database;

use Chemisus\Container\ArrayContainer;
use Chemisus\Container\Container;

class DeleteQueryBuilder extends AbstractQueryBuilder
{
    /**
     * @var string
     */
    private $table;

    /**
     * @var Container
     */
    private $wheres;

    /**
     * @var Container
     */
    private $orders;

    /**
     * @var int
     */
    private $limit;

    /**
     * DeleteQueryBuilder constructor.
     * @param QueryFactory $queryFactory
     * @param string $table
     * @param Container $where
     * @param Container $order
     * @param int $limit
     */
    public function __construct(QueryFactory $queryFactory, $table = null, Container $where = null, Container $order = null, $limit = null)
    {
        parent::__construct($queryFactory);
        $this->table = $table;
        $this->wheres = $where ?: new ArrayContainer();
        $this->orders = $order ?: new ArrayContainer();
        $this->limit = $limit;
    }

    /**
     * @param mixed $table
     * @return $this
     */
    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @param mixed $orders
     * @return $this
     */
    public function orders($orders)
    {
        $orders = is_array($orders) ? new ArrayContainer($orders) : $orders;
        $this->orders = $orders ?: new ArrayContainer();
        return $this;
    }

    /**
     * @param mixed $wheres
     * @return $this
     */
    public function wheres($wheres)
    {
        $wheres = is_array($wheres) ? new ArrayContainer($wheres) : $wheres;
        $this->wheres = $wheres ?: new ArrayContainer();
        return $this;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return Query
     */
    public function build()
    {
        return $this->queryFactory()->delete($this->table, $this->wheres, $this->orders, $this->limit);
    }
}
