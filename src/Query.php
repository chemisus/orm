<?php

namespace Chemisus\Database;

use Chemisus\Container\Container;

interface Query
{
    /**
     * @return Container
     */
    public function parameters();
}
