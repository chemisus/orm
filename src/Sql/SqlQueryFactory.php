<?php

namespace Chemisus\Database\Sql;

use Chemisus\Database\QueryFactory;

class SqlQueryFactory implements QueryFactory
{
    public function select($fields, $from, $where, $group, $having, $order, $limit)
    {
        return new SqlSelectQuery($fields, $from, $where, $group, $having, $order, $limit);
    }

    public function insert($table, $fields, $values)
    {
        return new SqlInsertQuery($table, $fields, $values);
    }

    public function update($table, $fields, $values, $where, $order, $limit)
    {
        return new SqlUpdateQuery($table, $fields, $values, $where, $order, $limit);
    }

    public function delete($table, $where, $order, $limit)
    {
        return new SqlDeleteQuery($table, $where, $order, $limit);
    }

    public function createDatabase()
    {
        // TODO: Implement createDatabase() method.
    }

    public function createTable()
    {
        // TODO: Implement createTable() method.
    }
}