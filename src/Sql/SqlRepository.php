<?php

namespace Chemisus\Database\Sql;

use Chemisus\Database\Repository;
use Chemisus\Database\Statement;
use PDO;

class SqlRepository implements Repository
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * SqlRepository constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function execute(Statement $statement)
    {

    }
}