<?php

use Phinx\Migration\AbstractMigration;

class MultidimensionSections extends AbstractMigration
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
      $sectionTable = $this->table('sections');
      $sectionTable->addColumn('section_id', 'integer', [
        'length' => 9,
        'default' => null,
        'null' => true
      ])
      ->addIndex('section_id')
      ->addForeignKey('section_id', 'sections', "id")
      ->update();
    }

    public function down(){
      $sectionTable = $this->table("sections");
      $sectionTable->dropForeignKey('section_id')
      ->removeIndex('section_id')
      ->removeColumn('section_id')
      ->update();
    }
}
