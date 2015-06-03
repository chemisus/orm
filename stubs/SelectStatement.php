<?php

namespace Chemisus\Database;

use Chemisus\Database\QueryBuilders\SelectQueryBuilder;

class SelectStatement implements Statement
{
    public function build(StatementBuilder $q)
    {
        return $q->select(function (SelectQueryBuilder $q) {
            $q->fields([])
                ->froms([])
                ->wheres([])
                ->groups([])
                ->havings([])
                ->orders([])
                ->limit(5);
        });
    }
}
