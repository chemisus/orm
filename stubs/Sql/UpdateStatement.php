<?php

namespace Chemisus\Database\Sql;

use Chemisus\Database\StatementBuilder;
use Chemisus\Database\UpdateQueryBuilder;
use Chemisus\Database\Statement;

class UpdateStatement implements Statement
{
    public function build(StatementBuilder $q)
    {
        return $q->update(function (UpdateQueryBuilder $q) {
            $q->from([]);
        });
    }
}
