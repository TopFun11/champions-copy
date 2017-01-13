<?php

use Phinx\Migration\AbstractMigration;

class RelationTest extends AbstractMigration
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
       $sectionsTable = $this->table('sections');
       $sectionsTable
          ->addColumn('module_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
          ])
          ->addIndex('module_id')
          ->addForeignKey('module_id', 'module', 'id')
          ->update();
     }

     public function down(){
        $sectionsTable = $this->table('sections');
        $sectionsTable
          ->removeForeignKey('module_id')
          ->removeIndex('module_id')
          ->removeColumn('module_id')
          ->update();
     }
}
