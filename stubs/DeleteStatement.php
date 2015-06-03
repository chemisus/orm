<?php

namespace Chemisus\Database;

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
