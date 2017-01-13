<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WeekTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WeekTable Test Case
 */
class WeekTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WeekTable
     */
    public $Week;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.week'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Week') ? [] : ['className' => 'App\Model\Table\WeekTable'];
        $this->Week = TableRegistry::get('Week', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Week);

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
}
