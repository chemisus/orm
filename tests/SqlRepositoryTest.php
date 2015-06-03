<?php

namespace Chemisus\Database;

use Chemisus\Database\DeleteStatement;
use Chemisus\Database\InsertStatement;
use Chemisus\Database\Jql\JqlExpressionFactory;
use Chemisus\Database\Jql\JqlRepository;
use Chemisus\Database\Repository;
use Chemisus\Database\SelectStatement;
use Chemisus\Database\Sql\SqlExpressionFactory;
use Chemisus\Database\Sql\SqlRepository;
use Chemisus\Database\Statement;
use Chemisus\Database\StatementBuilder;
use Chemisus\Database\UpdateStatement;
use Mockery;
use Mockery\MockInterface;
use PDO;
use PHPUnit_Framework_TestCase;

class SqlRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        parent::tearDown();

        Mockery::close();
    }

    /**
     * @return MockInterface
     */
    public function testMakePDO()
    {
        return Mockery::mock('PDO');
    }

    /**
     * @param PDO $pdo
     * @return Repository
     * @depends testMakePDO
     */
    public function testMakeSqlRepository(PDO $pdo)
    {
        return new SqlRepository($pdo);
    }

    /**
     * @return StatementBuilder
     */
    public function testMakeSqlStatementBuilder()
    {
        return new StatementBuilder(new SqlExpressionFactory());
    }

    /**
     * @param StatementBuilder $builder
     * @param Repository $repo
     * @param PDO|MockInterface $pdo
     * @depends testMakeSqlStatementBuilder
     * @depends testMakeSqlRepository
     * @depends testMakePDO
     */
    public function testSelectStatementSql(StatementBuilder $builder, Repository $repo, PDO $pdo)
    {
        $sqlStatement = Mockery::mock('PDOStatement');
        $sqlStatement->shouldReceive('execute')->once();
        $sqlStatement->shouldReceive('fetchAll')->once();
        $sql = "select `test_field_1`, `test_field_2` from `test_table`";
        $pdo->shouldReceive('prepare')->with($sql)->once()->andReturn($sqlStatement);
        $statement = new SelectStatement();
        $query = $statement->build($builder)->build();
        $this->assertInstanceOf('Chemisus\Database\Sql\SqlQuery', $query);
        $this->assertEquals($sql, $query->toSql());
        $repo->execute($statement);
    }
}
