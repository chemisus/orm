<?php

namespace Chemisus\Database\Sql;

use Chemisus\Database\StatementBuilder;
use Chemisus\Database\InsertQueryBuilder;
use Chemisus\Database\Statement;

class InsertStatement implements Statement
{
    /**
     * @param StatementBuilder $q
     * @return InsertQueryBuilder
     */
    public function build(StatementBuilder $q)
    {
        return $q->insert(function (InsertQueryBuilder $q) {
            $q->from([]);
        });
    }
}
