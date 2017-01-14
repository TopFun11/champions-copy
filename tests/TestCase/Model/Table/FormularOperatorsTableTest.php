<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormularOperatorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormularOperatorsTable Test Case
 */
class FormularOperatorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FormularOperatorsTable
     */
    public $FormularOperators;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.formular_operators',
        'app.formular',
        'app.screener',
        'app.module',
        'app.sections',
        'app.users',
        'app.userenrollment',
        'app.formular_variables',
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
        $config = TableRegistry::exists('FormularOperators') ? [] : ['className' => 'App\Model\Table\FormularOperatorsTable'];
        $this->FormularOperators = TableRegistry::get('FormularOperators', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FormularOperators);

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
