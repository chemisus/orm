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
use PDO;
use PHPUnit_Framework_TestCase;

class RepositoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return Repository
     */
    public function testMakeSqlRepository()
    {
        return new SqlRepository(new PDO("mysql://localhost", "root"));
    }

    /**
     * @return Repository
     */
    public function testMakeJqlRepository()
    {
        return new JqlRepository();
    }

    /**
     * @return StatementBuilder
     */
    public function testMakeSqlStatementBuilder()
    {
        return new StatementBuilder(new SqlExpressionFactory());
    }

    /**
     * @return StatementBuilder
     */
    public function testMakeJqlStatementBuilder()
    {
        return new StatementBuilder(new JqlExpressionFactory());
    }

    /**
     * @param Repository $sql
     * @param Repository $jql
     * @depends testMakeSqlRepository
     * @depends testMakeJqlRepository
     * @return SelectStatement
     */
    public function testExecuteSelectStatement(Repository $sql, Repository $jql)
    {
        $statement = new SelectStatement();
        $sql->execute($statement);
        $jql->execute($statement);
        return $statement;
    }

    /**
     * @param Repository $sql
     * @param Repository $jql
     * @depends testMakeSqlRepository
     * @depends testMakeJqlRepository
     * @return InsertStatement
     */
    public function testExecuteInsertStatement(Repository $sql, Repository $jql)
    {
        $statement = new InsertStatement();
        $sql->execute($statement);
        $jql->execute($statement);
        return $statement;
    }

    /**
     * @param Repository $sql
     * @param Repository $jql
     * @depends testMakeSqlRepository
     * @depends testMakeJqlRepository
     * @return UpdateStatement
     */
    public function testExecuteUpdateStatement(Repository $sql, Repository $jql)
    {
        $statement = new UpdateStatement();
        $sql->execute($statement);
        $jql->execute($statement);
        return $statement;
    }

    /**
     * @param Repository $sql
     * @param Repository $jql
     * @depends testMakeSqlRepository
     * @depends testMakeJqlRepository
     * @return DeleteStatement
     */
    public function testExecuteDeleteStatement(Repository $sql, Repository $jql)
    {
        $statement = new DeleteStatement();
        $sql->execute($statement);
        $jql->execute($statement);
        return $statement;
    }

    /**
     * @param StatementBuilder $sql
     * @param StatementBuilder $jql
     * @param Statement $statement
     * @depends testMakeSqlStatementBuilder
     * @depends testMakeJqlStatementBuilder
     * @depends testExecuteSelectStatement
     */
    public function testBuildSelectStatement(StatementBuilder $sql, StatementBuilder $jql, Statement $statement)
    {
        $this->assertInstanceOf('Chemisus\Database\QueryBuilders\SelectQueryBuilder', $statement->build($sql));
        $this->assertInstanceOf('Chemisus\Database\QueryBuilders\SelectQueryBuilder', $statement->build($jql));
    }

    /**
     * @param StatementBuilder $sql
     * @param StatementBuilder $jql
     * @param Statement $statement
     * @depends testMakeSqlStatementBuilder
     * @depends testMakeJqlStatementBuilder
     * @depends testExecuteInsertStatement
     */
    public function testBuildInsertStatement(StatementBuilder $sql, StatementBuilder $jql, Statement $statement)
    {
        $this->assertInstanceOf('Chemisus\Database\QueryBuilders\InsertQueryBuilder', $statement->build($sql));
        $this->assertInstanceOf('Chemisus\Database\QueryBuilders\InsertQueryBuilder', $statement->build($jql));
    }

    /**
     * @param StatementBuilder $sql
     * @param StatementBuilder $jql
     * @param Statement $statement
     * @depends testMakeSqlStatementBuilder
     * @depends testMakeJqlStatementBuilder
     * @depends testExecuteUpdateStatement
     */
    public function testBuildUpdateStatement(StatementBuilder $sql, StatementBuilder $jql, Statement $statement)
    {
        $this->assertInstanceOf('Chemisus\Database\QueryBuilders\UpdateQueryBuilder', $statement->build($sql));
        $this->assertInstanceOf('Chemisus\Database\QueryBuilders\UpdateQueryBuilder', $statement->build($jql));
    }

    /**
     * @param StatementBuilder $sql
     * @param StatementBuilder $jql
     * @param Statement $statement
     * @depends testMakeSqlStatementBuilder
     * @depends testMakeJqlStatementBuilder
     * @depends testExecuteDeleteStatement
     */
    public function testBuildDeleteStatement(StatementBuilder $sql, StatementBuilder $jql, Statement $statement)
    {
        $this->assertInstanceOf('Chemisus\Database\QueryBuilders\DeleteQueryBuilder', $statement->build($sql));
        $this->assertInstanceOf('Chemisus\Database\QueryBuilders\DeleteQueryBuilder', $statement->build($jql));
    }

    /**
     * @param StatementBuilder $sql
     * @param StatementBuilder $jql
     * @param Statement $statement
     * @depends testMakeSqlStatementBuilder
     * @depends testMakeJqlStatementBuilder
     * @depends testExecuteSelectStatement
     */
    public function testBuildSelectQuery(StatementBuilder $sql, StatementBuilder $jql, Statement $statement)
    {
        $this->assertInstanceOf('Chemisus\Database\Sql\SqlSelectQuery', $statement->build($sql)->build());
        $this->assertInstanceOf('Chemisus\Database\Jql\JqlSelectQuery', $statement->build($jql)->build());
    }

    /**
     * @param StatementBuilder $sql
     * @param StatementBuilder $jql
     * @param Statement $statement
     * @depends testMakeSqlStatementBuilder
     * @depends testMakeJqlStatementBuilder
     * @depends testExecuteUpdateStatement
     */
    public function testBuildUpdateQuery(StatementBuilder $sql, StatementBuilder $jql, Statement $statement)
    {
        $this->assertInstanceOf('Chemisus\Database\Sql\SqlUpdateQuery', $statement->build($sql)->build());
        $this->assertInstanceOf('Chemisus\Database\Jql\JqlUpdateQuery', $statement->build($jql)->build());
    }

    /**
     * @param StatementBuilder $sql
     * @param StatementBuilder $jql
     * @param Statement $statement
     * @depends testMakeSqlStatementBuilder
     * @depends testMakeJqlStatementBuilder
     * @depends testExecuteInsertStatement
     */
    public function testBuildInsertQuery(StatementBuilder $sql, StatementBuilder $jql, Statement $statement)
    {
        $this->assertInstanceOf('Chemisus\Database\Sql\SqlInsertQuery', $statement->build($sql)->build());
        $this->assertInstanceOf('Chemisus\Database\Jql\JqlInsertQuery', $statement->build($jql)->build());
    }

    /**
     * @param StatementBuilder $sql
     * @param StatementBuilder $jql
     * @param Statement $statement
     * @depends testMakeSqlStatementBuilder
     * @depends testMakeJqlStatementBuilder
     * @depends testExecuteDeleteStatement
     */
    public function testBuildDeleteQuery(StatementBuilder $sql, StatementBuilder $jql, Statement $statement)
    {
        $this->assertInstanceOf('Chemisus\Database\Sql\SqlDeleteQuery', $statement->build($sql)->build());
        $this->assertInstanceOf('Chemisus\Database\Jql\JqlDeleteQuery', $statement->build($jql)->build());
    }
}
