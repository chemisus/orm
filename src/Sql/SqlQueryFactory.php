<?php

namespace Chemisus\Database\Sql;

use Chemisus\Container\Container;
use Chemisus\Database\QueryFactory;

class SqlQueryFactory implements QueryFactory
{
    /**
     * @param Container $fields
     * @param Container $from
     * @param Container $where
     * @param Container $group
     * @param Container $having
     * @param Container $order
     * @param int $limit
     * @return SqlSelectQuery
     */
    public function select(Container $fields, Container $from, Container $where, Container $group, Container $having, Container $order, $limit)
    {
        return new SqlSelectQuery($fields, $from, $where, $group, $having, $order, $limit);
    }

    /**
     * @param string $table
     * @param Container $fields
     * @param Container $values
     * @return SqlInsertQuery
     */
    public function insert($table, Container $fields, Container $values)
    {
        return new SqlInsertQuery($table, $fields, $values);
    }

    /**
     * @param string $table
     * @param Container $fields
     * @param Container $values
     * @param Container $where
     * @param Container $order
     * @param int $limit
     * @return SqlUpdateQuery
     */
    public function update($table, Container $fields, Container $values, Container $where, Container $order, $limit)
    {
        return new SqlUpdateQuery($table, $fields, $values, $where, $order, $limit);
    }

    /**
     * @param string $table
     * @param Container $where
     * @param Container $order
     * @param int $limit
     * @return SqlDeleteQuery
     */
    public function delete($table, Container $where, Container $order, $limit)
    {
        return new SqlDeleteQuery($table, $where, $order, $limit);
    }

    /**
     *
     */
    public function createDatabase()
    {
        // TODO: Implement createDatabase() method.
    }

    /**
     *
     */
    public function createTable()
    {
        // TODO: Implement createTable() method.
    }
}