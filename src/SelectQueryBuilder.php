<?php

namespace Chemisus\Database;

class SelectQueryBuilder extends AbstractQueryBuilder
{
    private $fields;
    private $from;
    private $where;
    private $group;
    private $having;
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
     * @param mixed $group
     * @return SelectQueryBuilder
     */
    public function group($group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @param mixed $having
     * @return SelectQueryBuilder
     */
    public function having($having)
    {
        $this->having = $having;
        return $this;
    }

    /**
     * @param mixed $order
     * @return SelectQueryBuilder
     */
    public function order($order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @param mixed $limit
     * @return SelectQueryBuilder
     */
    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return Query
     */
    public function build()
    {
        return $this->queryFactory()->select(
            $this->fields,
            $this->from,
            $this->where,
            $this->group,
            $this->having,
            $this->order,
            $this->limit
        );
    }
}