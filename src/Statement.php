<?php

namespace Chemisus\Database;

interface Statement
{
    /**
     * @param StatementBuilder $q
     * @return QueryBuilder
     */
    public function build(StatementBuilder $q);
}
