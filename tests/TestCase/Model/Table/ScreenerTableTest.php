<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ScreenerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ScreenerTable Test Case
 */
class ScreenerTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ScreenerTable
     */
    public $Screener;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.screener'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Screener') ? [] : ['className' => 'App\Model\Table\ScreenerTable'];
        $this->Screener = TableRegistry::get('Screener', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Screener);

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
