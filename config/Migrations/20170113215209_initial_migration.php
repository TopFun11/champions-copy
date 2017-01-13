<?php

use Phinx\Migration\AbstractMigration;

class InitialMigration extends AbstractMigration
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
     *
     *    public function change()
     *    {
     *
     *    }*/
     public function up(){
       $sectionsTable = $this->table('sections');
       $sectionsTable -> addColumn('title', 'string', ['length' => 20])
       ->addColumn('content', 'string')
       ->create();
     }

     public function down(){
       $this->dropTable('sections');
     }
}
