<?php

namespace Chemisus\Database;

interface QueryFactory
{
    public function select($fields, $from, $where, $group, $having, $order, $limit);

    public function insert($table, $fields, $values);

    public function update($table, $fields, $values, $where, $order, $limit);

    public function delete($table, $where, $order, $limit);

    public function createDatabase();

    public function createTable();
}