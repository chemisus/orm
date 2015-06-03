<?php

namespace Chemisus\Database\QueryBuilders;

use Chemisus\Container\ArrayContainer;
use Chemisus\Container\Container;
use Chemisus\Database\QueryBuilders\AbstractQueryBuilder;
use Chemisus\Database\Query;
use Chemisus\Database\ExpressionFactory;

class InsertQueryBuilder extends AbstractQueryBuilder
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
     * InsertQueryBuilder constructor.
     * @param ExpressionFactory $queryFactory
     * @param string $table
     * @param Container $fields
     * @param Container $wheres
     */
    public function __construct(ExpressionFactory $queryFactory, $table = null, Container $fields = null, Container $wheres = null)
    {
        parent::__construct($queryFactory);
        $this->table = $table;
        $this->fields = $fields ?: new ArrayContainer();
        $this->values = $wheres ?: new ArrayContainer();
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
     * @return Query
     */
    public function build()
    {
        return $this->queryFactory()->insert($this->table, $this->fields, $this->values);
    }
}