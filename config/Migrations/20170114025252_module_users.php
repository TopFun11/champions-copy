<?php

use Phinx\Migration\AbstractMigration;

class ModuleUsers extends AbstractMigration
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
      $enrollmentTable = $this->table('userenrollment');

      $enrollmentTable
      ->addColumn('module_id', 'integer', [
        'length' => 50
      ])
      ->addIndex('module_id')
      ->addForeignKey('module_id', 'module', 'id')
      ->addColumn('user_id', 'integer', [
        'length' => 50,
      ])
      ->addIndex('user_id')
      ->addForeignKey('user_id', 'users', 'id')
      ->create();
      echo "Migrate complete";
    }

    public function down(){
      $this->dropTable('userenrollment');
    }
}
