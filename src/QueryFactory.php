<?php

namespace Chemisus\Database;

use Chemisus\Container\Container;

interface QueryFactory
{
    /**
     * @param Container $fields
     * @param Container $from
     * @param Container $where
     * @param Container $group
     * @param Container $having
     * @param Container $order
     * @param int $limit
     * @return mixed
     */
    public function select(Container $fields, Container $from, Container $where, Container $group, Container $having, Container $order, $limit);

    /**
     * @param string $table
     * @param Container $fields
     * @param Container $values
     * @return mixed
     */
    public function insert($table, Container $fields, Container $values);

    /**
     * @param string $table
     * @param Container $fields
     * @param Container $values
     * @param Container $where
     * @param Container $order
     * @param int $limit
     * @return mixed
     */
    public function update($table, Container $fields, Container $values, Container $where, Container $order, $limit);

    /**
     * @param string $table
     * @param Container $where
     * @param Container $order
     * @param int $limit
     * @return mixed
     */
    public function delete($table, Container $where, Container $order, $limit);

    public function createDatabase();

    public function createTable();
}