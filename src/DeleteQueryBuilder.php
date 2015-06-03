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
        $this->where = $where ?: new ArrayContainer();
        $this->order = $order ?: new ArrayContainer();
        $this->limit = $limit;
    }

    /**
     * @param mixed $table
     * @return SelectQueryBuilder
     */
    public function table($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @param mixed $fields
     * @return SelectQueryBuilder
     */
    public function fields($fields)
    {
        $this->order = $fields;
        return $this;
    }

    /**
     * @param mixed $where
     * @return SelectQueryBuilder
     */
    public function where($where)
    {
        $this->where = $where;
        return $this;
    }

    /**
     * @return Query
     */
    public function build()
    {
        return $this->queryFactory()->delete($this->table, $this->where, $this->order, $this->limit);
    }
}