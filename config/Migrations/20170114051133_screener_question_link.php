<?php

use Phinx\Migration\AbstractMigration;

class ScreenerQuestionLink extends AbstractMigration
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
      $questionTable = $this->table('question');

      $questionTable
        ->addColumn('screener_id', 'integer', [
          'limit' => 11,
          'default' => null,
          'null' => false,
        ])
        ->addIndex('screener_id')
        ->addForeignKey('screener_id', "screener", "id")
        ->update();
    }

    public function down(){
      $questionTable = $this->table('question');

      $questionTable
        ->dropForiegnKey('screener_id')
        ->removeIndex('screener_id')
        ->removeColumn('screener_id')
        ->update();
    }
}
