<?php

use Phinx\Migration\AbstractMigration;

class UserMigration extends AbstractMigration
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
       $userTable = $this->table('users');

       $userTable
       ->addColumn('username', 'string', [
         'length' => 50,
       ])
       ->addColumn('password', 'string', [
         'length' => 255,
       ])
       ->addColumn('role', 'string', ['length' => 20])
       ->addColumn('created', 'datetime', [
         'default' => null,
         'null' => false,
       ])
       ->addColumn('modified', 'datetime', [
         'default' => null,
         'null' => false,
       ])
       ->create();
     }
     public function down(){
       $this->dropTable('users');
     }
}
