<?php

use Phinx\Migration\AbstractMigration;

class ProfileFields extends AbstractMigration
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
      $profile = $this->table("profile");

      $profile->addColumn("age", 'string', [
        'length' => 50,
        'default' => null,
        'null' => false
      ])
      ->addColumn('gender', 'string', [
        'length' => 50,
        'default' => null,
        'null' => false
      ])
      ->addColumn('hospital', 'string', [
        'length' => 255,
        'default' => null,
        'null' => false
      ])
      ->update();
    }
    public function down()
    {
      $profile = $this->table("profile");

      $profile->removeColumn("age")
      ->removeColumn('gender')
      ->removeColumn('hospital')
      ->update();
    }
}
