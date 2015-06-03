<?php

namespace Chemisus\Database;

interface QueryBuilder
{
    /**
     * @return Query
     */
    public function build();
}
