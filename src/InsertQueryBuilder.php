<?php

namespace Chemisus\Database;

class InsertQueryBuilder extends AbstractQueryBuilder
{
    private $fields;
    private $from;
    private $where;

    /**
     * @param mixed $fields
     * @return SelectQueryBuilder
     */
    public function fields($fields)
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param mixed $from
     * @return SelectQueryBuilder
     */
    public function from($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @param mixed $where
     * @return SelectQueryBuilder
     */
    public function where($where)
    {
        $this->where = $where;
        return $this;
    }

    /**
     * @return Query
     */
    public function build()
    {
        return $this->queryFactory()->insert($this->fields, $this->from, $this->where);
    }
}