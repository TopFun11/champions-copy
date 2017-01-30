<?php

use Phinx\Migration\AbstractMigration;

class MoreUserFields extends AbstractMigration
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
     public function up()
     {
       $user = $this->table("users");

       $user->addColumn('received_welcome_sms', 'boolean', [
         'default' => false
       ])
       ->addColumn('received_welcome_email', 'boolean', [
         'default' => false
       ])
       ->update();
     }
     public function down()
     {
       $user = $this->table("users");
       $user->removeColumn('received_welcome_sms')
       ->removeColumn('received_welcome_email')
       ->update();
     }
}
