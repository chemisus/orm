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
        $this->where = $where ?: new ArrayContainer();
        $this->order = $order ?: new ArrayContainer();
        $this->limit = $limit;
    }

    /**
     * @param mixed $fields
     * @return SelectQueryBuilder
     */
    public function fields($fields)
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param mixed $from
     * @return SelectQueryBuilder
     */
    public function from($from)
    {
        $this->table = $from;
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
        return $this->queryFactory()->update($this->table, $this->fields, $this->values, $this->where, $this->order, $this->limit);
    }
}