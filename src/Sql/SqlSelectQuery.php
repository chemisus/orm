<?php

namespace Chemisus\Database\Sql;

use Chemisus\Database\Query\AbstractSelectQuery;

class SqlSelectQuery extends AbstractSelectQuery implements SqlQuery
{
    public function toSql()
    {
        return $this->makeSelect() . $this->makeFrom() . $this->makeWhere();
    }

    public function makeSelect()
    {
        if (!$this->fields()->count()) {
            return "select *";
        }

        return "select " . $this->fields()->map(function ($field) {
            return $field;
        });
    }

    public function makeFrom()
    {
        if (!$this->from()->count()) {
            return "";
        }

        return "from " . implode(', ', $this->from()->each('toSql')->values());
    }

    public function makeWhere()
    {
        if (!$this->where()->count()) {
            return "";
        }

        return "where " . implode(' && ', $this->where()->each('toSql')->values());
    }
}
