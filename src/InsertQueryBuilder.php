<?php

namespace Chemisus\Database;

use Chemisus\Container\ArrayContainer;
use Chemisus\Container\Container;

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
     * @param QueryFactory $queryFactory
     * @param string $table
     * @param Container $fields
     * @param Container $where
     */
    public function __construct(QueryFactory $queryFactory, $table = null, Container $fields = null, Container $where = null)
    {
        parent::__construct($queryFactory);
        $this->table = $table;
        $this->fields = $fields ?: new ArrayContainer();
        $this->values = $where ?: new ArrayContainer();
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
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param mixed $values
     * @return SelectQueryBuilder
     */
    public function values($values)
    {
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