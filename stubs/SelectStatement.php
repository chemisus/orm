<?php

namespace Chemisus\Database;

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
