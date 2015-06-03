<?php

namespace Chemisus\Database;

class UpdateQueryBuilder extends AbstractQueryBuilder
{
    private $table;
    private $fields;
    private $values;
    private $where;
    private $order;
    private $limit;

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
        $this->table = $from;
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
        return $this->queryFactory()->update($this->table, $this->fields, $this->values, $this->where, $this->order, $this->limit);
    }
}