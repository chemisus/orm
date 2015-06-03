<?php

namespace Chemisus\Database\QueryBuilders;

use Chemisus\Container\ArrayContainer;
use Chemisus\Container\Container;
use Chemisus\Database\QueryBuilders\AbstractQueryBuilder;
use Chemisus\Database\Query;
use Chemisus\Database\ExpressionFactory;

class SelectQueryBuilder extends AbstractQueryBuilder
{
    /**
     * @var Container
     */
    private $fields;

    /**
     * @var Container
     */
    private $froms;

    /**
     * @var Container
     */
    private $wheres;

    /**
     * @var Container
     */
    private $groups;

    /**
     * @var Container
     */
    private $havings;

    /**
     * @var Container
     */
    private $orders;

    /**
     * @var int
     */
    private $limit;

    /**
     * SelectQueryBuilder constructor.
     * @param ExpressionFactory $queryFactory
     * @param Container $fields
     * @param Container $froms
     * @param Container $wheres
     * @param Container $groups
     * @param Container $havings
     * @param Container $orders
     * @param int $limit
     */
    public function __construct(ExpressionFactory $queryFactory, Container $fields = null, Container $froms = null, Container $wheres = null, Container $groups = null, Container $havings = null, Container $orders = null, $limit = null)
    {
        parent::__construct($queryFactory);
        $this->fields = $fields ?: new ArrayContainer();
        $this->froms = $froms ?: new ArrayContainer();
        $this->wheres = $wheres ?: new ArrayContainer();
        $this->groups = $groups ?: new ArrayContainer();
        $this->havings = $havings ?: new ArrayContainer();
        $this->orders = $orders ?: new ArrayContainer();
        $this->limit = $limit;
    }

    /**
     * @param mixed $fields
     * @return $this
     */
    public function fields($fields)
    {
        $fields = func_num_args() > 1 ? func_get_args() : $fields;
        $fields = is_string($fields) ? [$fields] : $fields;
        $fields = is_callable($fields) ? call_user_func($fields) : $fields;
        $fields = is_array($fields) ? new ArrayContainer($fields) : $fields;
        $this->fields = $fields->map(function ($field) {
            $field = is_string($field) ? $this->queryFactory()->field($field) : $field;
            return $field;
        });
        return $this;
    }

    /**
     * @param mixed $froms
     * @return $this
     */
    public function froms($froms)
    {
        $froms = is_array($froms) ? new ArrayContainer($froms) : $froms;
        $this->froms = $froms;
        return $this;
    }

    /**
     * @param mixed $where
     * @return $this
     */
    public function wheres($where)
    {
        $where = is_array($where) ? new ArrayContainer($where) : $where;
        $this->wheres = $where;
        return $this;
    }

    /**
     * @param mixed $groups
     * @return $this
     */
    public function groups($groups)
    {
        $groups = is_array($groups) ? new ArrayContainer($groups) : $groups;
        $this->groups = $groups;
        return $this;
    }

    /**
     * @param mixed $havings
     * @return $this
     */
    public function havings($havings)
    {
        $havings = is_array($havings) ? new ArrayContainer($havings) : $havings;
        $this->havings = $havings;
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
        return $this->queryFactory()->select(
            $this->fields,
            $this->froms,
            $this->wheres,
            $this->groups,
            $this->havings,
            $this->orders,
            $this->limit
        );
    }
}