<?php

use Phinx\Migration\AbstractMigration;

class QuestionOptions extends AbstractMigration
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
      $questionsTable = $this->table('question');
      $questionsTable->addColumn('type', 'integer', [
        'length' => 3,
      ])
      ->update();

      $optionTable = $this->table('question_option');
      $optionTable->addColumn('description', 'string', [
        'length' => 255,
        'default' => null,
        'null' => false
      ])
      ->addColumn('value', 'integer', [
        'length' => 50,
        'default' => null,
        'null' => false
      ])
      ->addColumn('orderNumber', 'integer', [
        'length' => 2,
        'default' => 0,
        'null' => false
      ])
      ->addColumn('question_id', 'integer',
      ['length' => 2,
      'default' => null,
      'null' => false])
      ->addIndex('question_id')
      ->addForeignKey('question_id', 'question', 'id')
      ->create();
    }

    public function down(){
      $questionsTable = $this->table('question');
      $questionsTable->removeColumn('type')->update();

      $this->dropTable('question_option');
    }
}
