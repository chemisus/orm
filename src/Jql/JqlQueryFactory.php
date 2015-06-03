<?php

namespace Chemisus\Database\Jql;

use Chemisus\Container\Container;
use Chemisus\Database\QueryFactory;

class JqlQueryFactory implements QueryFactory
{
    public function select(Container $fields, Container $from, Container $where, Container $group, Container $having, Container $order, $limit)
    {
        return new JqlSelectQuery($fields, $from, $where, $group, $having, $order, $limit);
    }

    public function insert($table, Container $fields, Container $values)
    {
        return new JqlInsertQuery($table, $fields, $values);
    }

    public function update($table, Container $fields, Container $values, Container $where, Container $order, $limit)
    {
        return new JqlUpdateQuery($table, $fields, $values, $where, $order, $limit);
    }

    public function delete($table, Container $where, Container $order, $limit)
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