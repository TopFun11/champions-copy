<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DayTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DayTable Test Case
 */
class DayTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DayTable
     */
    public $Day;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.day'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Day') ? [] : ['className' => 'App\Model\Table\DayTable'];
        $this->Day = TableRegistry::get('Day', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Day);

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
