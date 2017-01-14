<?php

use Phinx\Migration\AbstractMigration;

class ScreenerModuleLink extends AbstractMigration
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
      //$this->down();
      $ScreenerTable = $this->table('screener');

      $ScreenerTable
        ->addColumn('module_id', 'integer', [
          'limit' => 11,
          'default' => null,
          'null' => false,
        ])
        ->addIndex('module_id')
        ->addForeignKey('module_id', "module", "id")
        ->update();
    }

    public function down(){
        $ScreenerTable = $this->table('screener');
        $ScreenerTable->dropForeignKey("module_id")
        ->removeIndex("module_id")
        ->removeColumn("module_id")
        ->update();
    }
}
