<?php

use Phinx\Migration\AbstractMigration;

class FormularLogicSanity extends AbstractMigration
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

    private function addVars(){
      $formVarTable = $this->table('formular_variables');

    //  $formVarTable->create();

    //  $formVarTable = $this->table('formular-variables');

      $formVarTable
       ->addColumn('formular_id', 'integer', [
          'limit' => 11,
          'default' => null,
          'null' => false
        ])
        ->addIndex('formular_id')
        ->addForeignKey('formular_id', 'formular', 'id')
        ->addColumn('question_id', 'integer', [
          'limit' => 11,
          'default' => null,
          'null' => false
        ])
        ->addIndex('question_id')
        ->addForeignKey('question_id', 'question', 'id')
        ->create();
    }

    public function addOps(){
      $formOpTable = $this->table('formular_operators');

      $formOpTable
        ->addColumn('formular_id', 'integer', [
          'limit' => 11,
          'default' => null,
          'null' => false
        ])
        ->addIndex('formular_id')
        ->addForeignKey('formular_id', 'formular', 'id')
        ->addColumn('operator', 'string', [
          'length' => 1,
          'default' => null,
          'null' => false
        ])
        ->create();

    }

    public function up(){
      //$this->addVars();
      //$this->addOps();

        /*$formTable = $this->table('formular');
        $formTable
        ->addColumn('screener_id', 'integer', [
          'limit' => 11,
          'default' => null,
          'null' => false,
        ])
        ->addIndex('screener_id')
        ->addForeignKey('screener_id', "screener", "id")
        ->update();*/
    }
    public function down(){
      $this->dropTable('formular_operators');
      $this->dropTable('formular_variables');
      /*$formTable = $this->table('formular');
      $formTable
        ->dropForeignKey('screener_id')
        ->removeIndex('screener_id')
        ->removeColumn('screener_id')
        ->update();*/
    }
}
