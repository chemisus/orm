<?php

namespace Chemisus\Database;

class UpdateStatement implements Statement
{
    public function build(StatementBuilder $q)
    {
        return $q->update(function (UpdateQueryBuilder $q) {
            $q->from([]);
        });
    }
}