<?php

namespace Chemisus\Database\Sql;

use Chemisus\Database\Query\AbstractIdentifier;

class SqlIdentifier extends AbstractIdentifier implements SqlQuery
{
    public function toSql()
    {
        return "`{$this->field()}`";
    }
}
