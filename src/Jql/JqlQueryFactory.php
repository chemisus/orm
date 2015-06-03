<?php

namespace Chemisus\Database\Jql;

use Chemisus\Database\QueryFactory;

class JqlQueryFactory implements QueryFactory
{
    public function select($fields, $from, $where, $group, $having, $order, $limit)
    {
        return new JqlSelectQuery($fields, $from, $where, $group, $having, $order, $limit);
    }

    public function insert($table, $fields, $values)
    {
        return new JqlInsertQuery($table, $fields, $values);
    }

    public function update($table, $fields, $values, $where, $order, $limit)
    {
        return new JqlUpdateQuery($table, $fields, $values, $where, $order, $limit);
    }

    public function delete($table, $where, $order, $limit)
    {
        return new JqlDeleteQuery($table, $where, $order, $limit);
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