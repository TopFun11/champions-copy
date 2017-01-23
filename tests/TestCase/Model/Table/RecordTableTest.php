<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecordTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecordTable Test Case
 */
class RecordTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecordTable
     */
    public $Record;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.record',
        'app.recordset',
        'app.screener',
        'app.module',
        'app.sections',
        'app.users',
        'app.userenrollment',
        'app.question',
        'app.question_option'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Record') ? [] : ['className' => 'App\Model\Table\RecordTable'];
        $this->Record = TableRegistry::get('Record', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Record);

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
