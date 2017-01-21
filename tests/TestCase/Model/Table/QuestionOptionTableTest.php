<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionOptionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionOptionTable Test Case
 */
class QuestionOptionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestionOptionTable
     */
    public $QuestionOption;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.question_option',
        'app.question',
        'app.screener',
        'app.module',
        'app.sections',
        'app.users',
        'app.userenrollment'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('QuestionOption') ? [] : ['className' => 'App\Model\Table\QuestionOptionTable'];
        $this->QuestionOption = TableRegistry::get('QuestionOption', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QuestionOption);

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
