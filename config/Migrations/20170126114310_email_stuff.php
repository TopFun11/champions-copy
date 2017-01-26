<?php

use Phinx\Migration\AbstractMigration;

class EmailStuff extends AbstractMigration
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
      $messageTable = $this->table('messages');
      $messageTable->addColumn('type', 'integer', [
        'length' => 2,
        'default' => null,
        'null' => false
      ])
      ->addColumn('subject', 'string', [
        'length' => 100,
        'default' => null,
        'null' => false
      ])
      ->addColumn('content', 'text', [
        'default' => null,
        'null' => false
      ])
      ->addColumn('sent', 'boolean', [
        'default' => false
      ])
      ->addColumn('scheduled_time', 'datetime', [
        'default' => null,
        'null' => false
      ])
      ->create();

      $profile = $this->table('profile');
      $profile->addColumn('unsubscribed', 'boolean', [
        'default' => false
      ])
      ->update();
    }

    public function down(){
      $this->dropTable('messages');

      $profile = $this->table('profile');
      $profile->removeColumn('unsubscribed')
      ->update();
    }
}
