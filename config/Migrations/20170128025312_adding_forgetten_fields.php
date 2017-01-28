<?php

use Phinx\Migration\AbstractMigration;

class AddingForgettenFields extends AbstractMigration
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
      $sectionTable = $this->table("sections");
      $sectionTable->removeColumn('title')->addColumn('title', 'string', [
        'length' => 255,
        'default' => null,
        'null' => true
      ])
      ->update();

      $profile = $this->table('users');
      $profile->addColumn('consent', 'boolean', [
        'default' => null,
        'null' => false
      ])
      ->update();
    }

    public function down(){
      $profile = $this->table('users');
      $profile->removeColumn('consent')->update();
    }
}
