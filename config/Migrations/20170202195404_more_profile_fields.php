<?php

use Phinx\Migration\AbstractMigration;

class MoreProfileFields extends AbstractMigration
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
      $profile->addColumn("general_health", 'string', [
        'length' => 100,
        'default' => null,
        'null' => false
      ])
      ->addColumn('supervises', 'boolean', [
        'default' => null,
        'null' => false
      ])
      ->addColumn('occupation', 'string', [
        'length' => 255,
        'default' => null,
        'null' => false
      ])
      ->addColumn('days_off_work', 'integer', [
        'length' => 3,
        'default' => null,
        'null' => false
      ])
      ->addColumn('absences_lasting_a_week', 'integer', [
        'length' => 2,
        'default' => null,
        'null' => false
      ])
      ->addColumn('work_performance', 'integer', [
        'length' => 2,
        'default' => null,
        'null' => false
      ])
      ->addColumn('wembs_optimism', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('wembs_useful', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('wembs_relaxed', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('wembs_interested_in_people', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('wembs_spare_energy', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('wembs_dealing_with_problems_well', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('wembs_thinking_clearly', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('wembs_good_about_self', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('wembs_close_to_others', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('wembs_feeling_confident', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('wembs_make_mind_up', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('wembs_loved', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('wembs_interested_in_new_things', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('wembs_cheerful', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('phq_anxious', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('phq_worrying', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('phq_interest_please', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('phq_depressed', 'string', [
        "length" => 100,
        "default" => null,
        "null" => false
      ])
      ->addColumn('motiv', 'string', [
        "length" => 1000,
        "default" => null,
        "null" => false
      ])
      ->update();
    }
    public function down()
    {
      $profile = $this->table("profile");
      $profile->removeColumn("general_health")
      ->removeColumn("supervises")
      ->removeColumn("occupation")
      ->removeColumn("days_off_work")
      ->removeColumn("absences_lasting_a_week")
      ->removeColumn("work_performance")
      ->removeColumn("wembs_optimism")
      ->removeColumn("wembs_useful")
      ->removeColumn("wembs_relaxed")
      ->removeColumn("wembs_interested_in_people")
      ->removeColumn("wembs_spare_energy")
      ->removeColumn("wembs_dealing_with_problems_well")
      ->removeColumn("wembs_thinking_clearly")
      ->removeColumn("wembs_good_about_self")
      ->removeColumn("wembs_close_to_others")
      ->removeColumn("wembs_feeling_confident")
      ->removeColumn("wembs_make_mind_up")
      ->removeColumn("wembs_loved")
      ->removeColumn("wembs_interested_in_new_things")
      ->removeColumn("wembs_cheerful")
      ->removeColumn("phq_anxious")
      ->removeColumn("phq_worrying")
      ->removeColumn("phq_interest_please")
      ->removeColumn("phq_depressed")
      ->update();

    }
}
