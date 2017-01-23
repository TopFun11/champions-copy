<?php

use Phinx\Migration\AbstractMigration;

class FormularOperatorOrder extends AbstractMigration
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
       $ops = $this->table('formular_operators');
       $ops->addColumn('orderNumber', 'integer', [
         'length' => 3,
         'default' => null,
         'null' => false
       ])
       ->update();
     }
     public function down(){
       $ops = $this->table('formular_operators');
       $ops->removeColumn('orderNumber')
       ->update();
     }
}
