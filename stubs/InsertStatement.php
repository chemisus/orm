<?php

namespace Chemisus\Database;

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
