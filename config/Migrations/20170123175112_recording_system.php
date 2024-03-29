<?php

use Phinx\Migration\AbstractMigration;

class RecordingSystem extends AbstractMigration
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
      $recordSetTable = $this->table("recordset");
      $recordSetTable->addColumn("screener_id", 'integer', [
        'length' => 9,
        'default' => null,
        'null' => false
      ])
      ->addIndex('screener_id')
      ->addForeignKey('screener_id', 'screener', 'id')
      ->addColumn('user_id', 'integer', [
        'length' => 9,
        'default' => null,
        'null' => false
      ])
      ->addIndex('user_id')
      ->addForeignKey('user_id', 'users', 'id')
      ->create();

      $recordTable = $this->table("record");
      $recordTable->addColumn("recordset_id", 'integer', [
        'length' => 9,
        'default' => null,
        'null' => false
      ])
      ->addIndex('recordset_id')
      ->addForeignKey('recordset_id', 'recordset', 'id')
      ->addColumn("answer", 'string', [
        'length' => 1000,
        'default' => null,
        'null' => true
      ])
      ->addColumn("question_option_id", 'integer', [
        'length' => 9,
        'default' => null,
        'null' => true
      ])
      ->addIndex('question_option_id')
      ->addForeignKey('question_option_id', "question_option", 'id')
      ->create();

    }

    public function down(){
      $this->dropTable('record');
      $this->dropTable('recordset');
    }
}
