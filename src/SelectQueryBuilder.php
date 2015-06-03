<?php

namespace Chemisus\Database;

use Chemisus\Container\ArrayContainer;
use Chemisus\Container\Container;

class SelectQueryBuilder extends AbstractQueryBuilder
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
     * SelectQueryBuilder constructor.
     * @param QueryFactory $queryFactory
     * @param Container $fields
     * @param Container $from
     * @param Container $where
     * @param Container $group
     * @param Container $having
     * @param Container $order
     * @param int $limit
     */
    public function __construct(QueryFactory $queryFactory, Container $fields = null, Container $from = null, Container $where = null, Container $group = null, Container $having = null, Container $order = null, $limit = null)
    {
        parent::__construct($queryFactory);

        $this->fields = $fields ?: new ArrayContainer();
        $this->from = $from ?: new ArrayContainer();
        $this->where = $where ?: new ArrayContainer();
        $this->group = $group ?: new ArrayContainer();
        $this->having = $having ?: new ArrayContainer();
        $this->order = $order ?: new ArrayContainer();
        $this->limit = $limit;
    }

    /**
     * @param mixed $fields
     * @return SelectQueryBuilder
     */
    public function fields($fields)
    {
        $fields = is_array($fields) ? new ArrayContainer($fields) : $fields;
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param mixed $from
     * @return SelectQueryBuilder
     */
    public function from($from)
    {
        $from = is_array($from) ? new ArrayContainer($from) : $from;
        $this->from = $from;
        return $this;
    }

    /**
     * @param mixed $where
     * @return SelectQueryBuilder
     */
    public function where($where)
    {
        $where = is_array($where) ? new ArrayContainer($where) : $where;
        $this->where = $where;
        return $this;
    }

    /**
     * @param mixed $group
     * @return SelectQueryBuilder
     */
    public function group($group)
    {
        $group = is_array($group) ? new ArrayContainer($group) : $group;
        $this->group = $group;
        return $this;
    }

    /**
     * @param mixed $having
     * @return SelectQueryBuilder
     */
    public function having($having)
    {
        $having = is_array($having) ? new ArrayContainer($having) : $having;
        $this->having = $having;
        return $this;
    }

    /**
     * @param mixed $order
     * @return SelectQueryBuilder
     */
    public function order($order)
    {
        $order = is_array($order) ? new ArrayContainer($order) : $order;
        $this->order = $order;
        return $this;
    }

    /**
     * @param mixed $limit
     * @return SelectQueryBuilder
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
        return $this->queryFactory()->select(
            $this->fields,
            $this->from,
            $this->where,
            $this->group,
            $this->having,
            $this->order,
            $this->limit
        );
    }
}