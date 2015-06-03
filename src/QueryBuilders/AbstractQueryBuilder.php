<?php

namespace Chemisus\Database\QueryBuilders;

use Chemisus\Database\QueryBuilder;
use Chemisus\Database\ExpressionFactory;

abstract class AbstractQueryBuilder implements QueryBuilder
{
    /**
     * @var ExpressionFactory
     */
    private $queryFactory;

    /**
     * AbstractQueryBuilder constructor.
     * @param ExpressionFactory $queryFactory
     */
    public function __construct(ExpressionFactory $queryFactory)
    {
        $this->queryFactory = $queryFactory;
    }

    /**
     * @return ExpressionFactory
     */
    public function queryFactory()
    {
        return $this->queryFactory;
    }
}