<?php

use Phinx\Migration\AbstractMigration;

class QuestionSizeChange extends AbstractMigration
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
      ->removeColumn('question')
      ->addColumn('question', 'string',[
        'length' => 255,
      ])
      ->update();
    }

    public function down(){
      $questionTable = $this->table('question');
      $questionTable
        ->removeColumn('question')
        ->addColumn('question', 'string',[
          'length' => 10
        ])
        ->update();
    }
}
