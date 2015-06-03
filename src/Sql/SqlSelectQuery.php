<?php

namespace Chemisus\Database\Sql;

use Chemisus\Database\AbstractSelectQuery;

class SqlSelectQuery extends AbstractSelectQuery implements SqlQuery
{
    public function toSql()
    {
        return $this->makeSelect() . $this->makeFrom() . $this->makeWhere();
    }

    public function makeSelect()
    {
        return "select " . $this->fields();
    }

    public function makeFrom()
    {
        return "from" . $this->from();
    }

    public function makeWhere()
    {
        return "from" . $this->where();
    }
}
