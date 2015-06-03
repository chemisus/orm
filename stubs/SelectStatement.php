<?php

namespace Chemisus\Database;

use Chemisus\Database\QueryBuilders\SelectQueryBuilder;

class SelectStatement implements Statement
{
    public function build(StatementBuilder $q)
    {
        return $q->select(function (SelectQueryBuilder $q) {
            $q->fields('test_field_1', 'test_field_2')
                ->froms('test_table')
                ->wheres([])
                ->groups([])
                ->havings([])
                ->orders([])
                ->limit(5);
        });
    }
}
