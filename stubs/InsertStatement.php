<?php

namespace Chemisus\Database;

use Chemisus\Database\QueryBuilders\InsertQueryBuilder;

class InsertStatement implements Statement
{
    /**
     * @param StatementBuilder $q
     * @return InsertQueryBuilder
     */
    public function build(StatementBuilder $q)
    {
        return $q->insert(function (InsertQueryBuilder $q) {
            $q->table([])
                ->fields([])
                ->values([]);
        });
    }
}
