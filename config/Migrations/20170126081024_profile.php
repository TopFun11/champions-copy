<?php

use Phinx\Migration\AbstractMigration;

class Profile extends AbstractMigration
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
      $profile = $this->table('profile');
      $profile->addColumn("image", 'string', [
        'length' => 255,
        'default' => null,
        'null' => false,
      ])
      ->addColumn('points', 'integer', [
        'length' => 50,
        'default' => 0
      ])
      ->addColumn('email', 'string', [
        'length' => 255,
        'default' => null,
        'null' => false
      ])
      ->addColumn('logCount', 'integer', [
          'length' => 50,
          'default' => 0
      ])
      ->addColumn('phone_number', 'string', [
        'length' => 14,
        'default' => null,
        'null' => false
      ])
      ->addColumn('user_id', 'integer', [
        'length' => 9,
        'default' => null,
        'null' => false
      ])
      ->addIndex('user_id')
      ->addForeignKey('user_id', 'users', 'id')
      ->create();
    }
    public function down(){
      $profile = $this->table('profile');
      $profile->dropForeignKey('user_id')
      ->removeIndex('user_id')->update();
      $this->dropTable('profile');

    }
}
