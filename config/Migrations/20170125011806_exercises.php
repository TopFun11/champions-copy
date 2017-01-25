<?php

use Phinx\Migration\AbstractMigration;

class Exercises extends AbstractMigration
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
    $exerciseTable = $this->table("exercise");
    $exerciseTable->addColumn('section_id', 'integer', [
      'length' => 9,
      'default' => null,
      'null' => true
    ])
    ->addIndex('section_id')
    ->addForeignKey('section_id', 'sections', 'id')
    ->addColumn('type', 'integer', [
      'length' => 1,
      'default' => null,
      'null' => false
    ])
    ->create();

    $recordsetTable = $this->table('recordset');
    $recordsetTable->dropForeignKey('screener_id')
    ->removeIndex('screener_id')
    ->removeColumn('screener_id')
    ->addColumn('screener_id', 'integer', [
      'length' => 9,
      'default' => null,
      'null' => true
    ])
    ->addIndex('screener_id')
    ->addForeignKey('screener_id', 'screener', 'id')
    ->addColumn('exercise_id', 'integer', [
      'length' => 9,
      'default' => null,
      'null' => true
    ])
    ->addIndex('exercise_id')
    ->addForeignKey('exercise_id', 'exercise', 'id')
    ->update();


    $questionTable = $this->table('question');
    $questionTable->addColumn('exercise_id', 'integer', [
      'length' => 9,
      'default' => null,
      'null' => true
    ])
    ->addIndex('exercise_id')
    ->addForeignKey('exercise_id', 'exercise', 'id')
    ->dropForeignKey('screener_id')
    ->removeIndex('screener_id')
    ->removeColumn('screener_id')
    ->addColumn('screener_id', 'integer', [
      'length' => 9,
      'default' => null,
      'null' => true
    ])
    ->addIndex('screener_id')
    ->addForeignKey('screener_id', 'screener', 'id')
    ->update();
  }
  public function down(){
    $questionTable = $this->table('question');
    $questionTable->dropForeignKey('exercise_id')
        ->removeIndex('exercise_id')
        ->removeColumn('exercise_id')
        ->dropForeignKey('screener_id')
        ->removeIndex('screener_id')
        ->removeColumn('screener_id')
        ->addColumn('screener_id', 'integer', [
          'length' => 9,
          'default' => null,
          'null' => true
        ])
        ->addIndex('screener_id')
        ->addForeignKey('screener_id', 'screener', 'id')
        ->update();

    $recordsetTable = $this->table('recordset');
    $recordsetTable->dropForeignKey('screener_id')
    ->removeIndex('screener_id')
    ->removeColumn('screener_id')
    ->addColumn('screener_id', 'integer', [
      'length' => 9,
      'default' => null,
      'null' => true
    ])
    ->addIndex('screener_id')
    ->addForeignKey('screener_id', 'screener', 'id')
    ->dropForeignKey('exercise_id')
    ->removeIndex('exercise_id')
    ->removeColumn('exercise_id')
    ->update();

    $this->dropTable('exercise');
  }
}
