<?php

use Phinx\Migration\AbstractMigration;

class Files extends AbstractMigration
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
        $filesTable = $this->table("files");

        $filesTable->addColumn("name", 'string', [
          'default' => null,
          'null' => false
        ])
        ->addColumn('path', 'string', [
          'length' => 255,
          'null' => false
        ])
        ->addColumn('module_id', 'integer', [
          'length' => 9,
          'null' => false
        ])
        ->addIndex('module_id')
        ->addForeignKey('module_id', 'module', 'id')
        ->create();
    }

    public function down(){
      $this->dropTable('files');
    }
}
