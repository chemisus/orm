<?php

namespace Chemisus\Database;

use Chemisus\Container\ArrayContainer;
use Chemisus\Container\Container;

class UpdateQueryBuilder extends AbstractQueryBuilder
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
     * UpdateQueryBuilder constructor.
     * @param QueryFactory $queryFactory
     * @param string $table
     * @param Container $fields
     * @param Container $values
     * @param Container $where
     * @param Container $order
     * @param int $limit
     */
    public function __construct(QueryFactory $queryFactory, $table = null, Container $fields = null, Container $values = null, Container $where = null, Container $order = null, $limit = null)
    {
        parent::__construct($queryFactory);
        $this->table = $table;
        $this->fields = $fields ?: new ArrayContainer();
        $this->values = $values ?: new ArrayContainer();
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
     * @param mixed $fields
     * @return $this
     */
    public function fields($fields)
    {
        $fields = is_array($fields) ? new ArrayContainer($fields) : $fields;
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param mixed $values
     * @return $this
     */
    public function values($values)
    {
        $values = is_array($values) ? new ArrayContainer($values) : $values;
        $this->values = $values;
        return $this;
    }

    /**
     * @param mixed $wheres
     * @return $this
     */
    public function wheres($wheres)
    {
        $wheres = is_array($wheres) ? new ArrayContainer($wheres) : $wheres;
        $this->wheres = $wheres;
        return $this;
    }

    /**
     * @param mixed $orders
     * @return $this
     */
    public function orders($orders)
    {
        $orders = is_array($orders) ? new ArrayContainer($orders) : $orders;
        $this->orders = $orders;
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
        return $this->queryFactory()->update($this->table, $this->fields, $this->values, $this->wheres, $this->orders, $this->limit);
    }
}