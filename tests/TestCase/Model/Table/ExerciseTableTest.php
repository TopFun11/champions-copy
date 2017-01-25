<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExerciseTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExerciseTable Test Case
 */
class ExerciseTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExerciseTable
     */
    public $Exercise;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exercise',
        'app.sections',
        'app.module',
        'app.screener',
        'app.question',
        'app.question_option',
        'app.formular',
        'app.formular_operators',
        'app.formular_variables',
        'app.users',
        'app.userenrollment',
        'app.recordset',
        'app.record'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Exercise') ? [] : ['className' => 'App\Model\Table\ExerciseTable'];
        $this->Exercise = TableRegistry::get('Exercise', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Exercise);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
