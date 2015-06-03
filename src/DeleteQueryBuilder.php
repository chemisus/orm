<?php

namespace Chemisus\Database;

class DeleteQueryBuilder extends AbstractQueryBuilder
{
    private $table;
    private $where;
    private $order;
    private $limit;

    /**
     * @param mixed $fields
     * @return SelectQueryBuilder
     */
    public function fields($fields)
    {
        $this->order = $fields;
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
        return $this->queryFactory()->delete($this->table, $this->where, $this->order, $this->limit);
    }
}