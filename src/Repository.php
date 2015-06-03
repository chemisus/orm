<?php

namespace Chemisus\Database;

interface Repository
{
    public function execute(Statement $statement);
}
