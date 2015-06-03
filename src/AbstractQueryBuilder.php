<?php

namespace Chemisus\Database;

abstract class AbstractQueryBuilder implements QueryBuilder
{
    /**
     * @var QueryFactory
     */
    private $queryFactory;

    /**
     * AbstractQueryBuilder constructor.
     * @param QueryFactory $queryFactory
     */
    public function __construct(QueryFactory $queryFactory)
    {
        $this->queryFactory = $queryFactory;
    }

    /**
     * @return QueryFactory
     */
    public function queryFactory()
    {
        return $this->queryFactory;
    }
}