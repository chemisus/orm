<?php

namespace Chemisus\Database\Sql;

use Chemisus\Database\StatementBuilder;
use Chemisus\Database\DeleteQueryBuilder;
use Chemisus\Database\Statement;

class DeleteStatement implements Statement
{
    public function build(StatementBuilder $q)
    {
        return $q->delete(function (DeleteQueryBuilder $q) {
            $q->from([]);
        });
    }
}
