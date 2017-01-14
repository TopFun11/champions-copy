<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormularVariablesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormularVariablesTable Test Case
 */
class FormularVariablesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FormularVariablesTable
     */
    public $FormularVariables;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.formular_variables',
        'app.formular',
        'app.screener',
        'app.module',
        'app.sections',
        'app.users',
        'app.userenrollment',
        'app.formular_operators',
        'app.question'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FormularVariables') ? [] : ['className' => 'App\Model\Table\FormularVariablesTable'];
        $this->FormularVariables = TableRegistry::get('FormularVariables', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FormularVariables);

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
