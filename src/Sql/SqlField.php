<?php

namespace Chemisus\Database\Sql;

use Chemisus\Database\Jql\AbstractField;
use Chemisus\Database\Query;

class SqlField extends AbstractField implements SqlQuery
{
    public function toSql()
    {
        return "`{$this->field()}`";
    }
}
