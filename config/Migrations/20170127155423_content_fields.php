<?php

use Phinx\Migration\AbstractMigration;

class ContentFields extends AbstractMigration
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
      $moduleTable = $this->Table('module');
      $moduleTable->addColumn('content', 'text', [
        'default' => null,
        'null' => true
      ])
      ->update();

    /*$sectionTable = $this->Table('sections');
      $sectionTable->addColumn('content', 'text', [
        'default' => null,
        'null' => true
      ])
      ->update();*/
    }

    public function down(){
      $moduleTable = $this->Table('module');
      $moduleTable->removeColumn('content')->update();

      /*$sectionTable = $this->Table('sections');
      $sectionTable->removeColumn('content')->update();*/
    }
}
