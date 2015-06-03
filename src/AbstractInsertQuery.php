<?php

namespace Chemisus\Database;

class AbstractInsertQuery
{
    private $table;
    private $fields;
    private $values;

    public function table()
    {
        return $this->table;
    }

    public function fields()
    {
        return $this->fields;
    }

    public function values()
    {
        return $this->values;
    }
}