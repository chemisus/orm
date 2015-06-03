<?php

namespace Chemisus\Database;

use Chemisus\Database\QueryBuilders\UpdateQueryBuilder;

class UpdateStatement implements Statement
{
    public function build(StatementBuilder $q)
    {
        return $q->update(function (UpdateQueryBuilder $q) {
            $q->table('')
                ->fields([])
                ->wheres([])
                ->values([])
                ->orders([])
                ->limit(5);
        });
    }
}
