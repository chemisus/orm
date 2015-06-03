<?php

namespace Chemisus\Database;

use Chemisus\Database\DeleteStatement;
use Chemisus\Database\InsertStatement;
use Chemisus\Database\Jql\JqlQueryFactory;
use Chemisus\Database\Jql\JqlRepository;
use Chemisus\Database\Repository;
use Chemisus\Database\SelectStatement;
use Chemisus\Database\Sql\SqlQueryFactory;
use Chemisus\Database\Sql\SqlRepository;
use Chemisus\Database\Statement;
use Chemisus\Database\StatementBuilder;
use Chemisus\Database\UpdateStatement;
use PDO;
use PHPUnit_Framework_TestCase;

class SqlRepositoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return Repository
     */
    public function testMakeSqlRepository()
    {
        return new SqlRepository(new PDO("mysql://localhost", "root"));
    }

    /**
     * @return StatementBuilder
     */
    public function testMakeSqlStatementBuilder()
    {
        return new StatementBuilder(new SqlQueryFactory());
    }

    /**
     * @param StatementBuilder $sql
     * @depends testMakeSqlStatementBuilder
     */
    public function testExecuteSelectStatement(StatementBuilder $sql)
    {
        $statement = new SelectStatement();
        $query = $statement->build($sql)->build();
        $this->assertInstanceOf('Chemisus\Database\Sql\SqlQuery', $query);
        $this->assertEquals("", $query->toSql());
    }
}
