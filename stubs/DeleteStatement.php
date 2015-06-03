<?php

namespace Chemisus\Database;

use Chemisus\Database\QueryBuilders\DeleteQueryBuilder;

class DeleteStatement implements Statement
{
    public function build(StatementBuilder $q)
    {
        return $q->delete(function (DeleteQueryBuilder $q) {
            $q->table([])
                ->wheres([])
                ->orders([])
                ->limit(5);
        });
    }
}
