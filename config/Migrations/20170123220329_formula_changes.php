<?php

use Phinx\Migration\AbstractMigration;

class FormulaChanges extends AbstractMigration
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
      $formulaTable = $this->table("formular");

      $formulaTable->addColumn('formula', 'string', [
        'length' => 255,
        'default' => null,
        'null' => false
      ])
      ->update();

      $recordTable = $this->table("record");
      $recordTable->addColumn("question_id", 'integer', [
        'length' => 9,
        'default' => null,
        'null' => false
      ])
      ->update();
    }

    public function down(){
      $formulaTable = $this->table("formular");

      $formulaTable->removeColumn('formula')->update();

      $recordTable = $this->table("record");
      $recordTable->removeColumn('question_id')->update();
    }
}
