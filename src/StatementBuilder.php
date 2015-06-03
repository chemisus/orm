<?php

namespace Chemisus\Database;

class StatementBuilder
{
    /**
     * @var QueryFactory
     */
    private $queryFactory;

    /**
     * StatementBuilder constructor.
     * @param $queryFactory
     */
    public function __construct(QueryFactory $queryFactory)
    {
        $this->queryFactory = $queryFactory;
    }

    public function createDatabase(callable $callback = null)
    {
    }

    public function createTable(callable $callback = null)
    {
    }

    /**
     * @param QueryBuilder $sb
     * @param callable $callback
     * @return QueryBuilder
     */
    public function prepare(QueryBuilder $sb, callable $callback = null)
    {
        if (is_callable($callback)) {
            call_user_func($callback, $sb);
        }

        return $sb;
    }

    /**
     * @param callable $callback
     * @return SelectQueryBuilder
     */
    public function select(callable $callback = null)
    {
        return $this->prepare(new SelectQueryBuilder($this->queryFactory), $callback);
    }

    /**
     * @param callable $callback
     * @return InsertQueryBuilder
     */
    public function insert(callable $callback = null)
    {
        return $this->prepare(new InsertQueryBuilder($this->queryFactory), $callback);
    }

    /**
     * @param callable $callback
     * @return UpdateQueryBuilder
     */
    public function update(callable $callback = null)
    {
        return $this->prepare(new UpdateQueryBuilder($this->queryFactory), $callback);
    }

    /**
     * @param callable $callback
     * @return DeleteQueryBuilder
     */
    public function delete(callable $callback = null)
    {
        return $this->prepare(new DeleteQueryBuilder($this->queryFactory), $callback);
    }
}