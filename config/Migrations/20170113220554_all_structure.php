<?php

use Phinx\Migration\AbstractMigration;

class AllStructure extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up(){
      $weekTable = $this->table('week');

      $weekTable->addColumn('useful', 'string')->create();

      $dayTable = $this->table('day');

      $dayTable->addColumn('amount', 'integer')->create();

      $screenerTable = $this->table('screener');
      $screenerTable->addColumn('Name', 'string')->create();

      $questionTable = $this->table('question');
      $questionTable->addColumn('question', 'string', ['length' => 10])->create();

      $formularTable = $this->table('formular');
      $formularTable->addColumn('name', 'string')->create();

      $motivationTable = $this->table('motivation');

      $motivationTable->addColumn('motivation', 'string')->create();
    }

    public function down(){
      $this->dropTable('week');
      $this->dropTable('day');
      $this->dropTable('screener');
      $this->dropTable('question');
      $this->dropTable('formular');
      $this->dropTable('motivation');
    }
}
