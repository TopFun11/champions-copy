<?php

use Phinx\Migration\AbstractMigration;

class ModuleImages extends AbstractMigration
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
      $moduleTable = $this->table('module');

      $moduleTable
        ->addColumn('banner', 'string', [
          'length' => 255,
          'default' => null,
          'null' => false
        ])
        ->addColumn('icon', 'string', [
          'length' => 255,
          'default' => null,
          'null' => false
        ])
        ->addColumn('description', 'string', [
          'length' => 10000,
          'default' => null,
          'null' => false
        ])
        ->update();
    }

    public function down(){
      $moduleTable = $this->table('module');

      $moduleTable
        ->removeColumn('banner')
        ->removeColumn('icon')
        ->removeColumn('description')
        ->update();
    }
}
