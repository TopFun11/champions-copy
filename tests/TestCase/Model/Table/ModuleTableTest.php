<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModuleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModuleTable Test Case
 */
class ModuleTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModuleTable
     */
    public $Module;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.module',
        'app.sections'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Module') ? [] : ['className' => 'App\Model\Table\ModuleTable'];
        $this->Module = TableRegistry::get('Module', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Module);

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
