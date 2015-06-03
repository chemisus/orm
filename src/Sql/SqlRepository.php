<?php

namespace Chemisus\Database\Sql;

use Chemisus\Database\Repository;
use Chemisus\Database\Statement;
use Chemisus\Database\StatementBuilder;
use Exception;
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
        $queryFactory = new SqlQueryFactory();
        $statementBuilder = new StatementBuilder($queryFactory);
        $query = $statement->build($statementBuilder);
        $sqlQuery = $query->build();
        if (!$sqlQuery instanceof SqlQuery) {
            throw new Exception();
        }
        $sql = $sqlQuery->toSql();
        return $this->query($sql);
    }

    public function query($sql, $params = [])
    {
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement->fetchAll(PDO::FETCH_OBJ);
    }
}