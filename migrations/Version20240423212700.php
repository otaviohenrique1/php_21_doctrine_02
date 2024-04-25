<?php

declare(strict_types=1);

namespace Alura\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240423212700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Criação de uma tabela de testes';
    }

    public function up(Schema $schema): void
    {
        // $this->addSql(sql: 'CREATE TABLE teste (id INTEGER PRIMARY KEY, coluna_teste VARCHAR(255), primary key(id)');
        $table = $schema->createTable(name: 'teste');
        $table
            ->addColumn(name: 'id', typeName: 'integer')
            ->setAutoincrement(flag: true);
        $table->addColumn(name: 'coluna_teste', typeName: 'string');
        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        // $this->addSql(sql: 'DROP TABLE teste;');
        $schema->dropTable(name: 'teste');
    }
}
