<?php

namespace Chemisus\Database\Sql;

use Chemisus\Database\StatementBuilder;
use Chemisus\Database\SelectQueryBuilder;
use Chemisus\Database\Statement;

class SelectStatement implements Statement
{
    public function build(StatementBuilder $q)
    {
        return $q->select(function (SelectQueryBuilder $q) {
            $q->fields([])
                ->from([])
                ->where([]);
        });
    }
}
