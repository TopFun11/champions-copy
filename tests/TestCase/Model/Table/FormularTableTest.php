<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormularTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormularTable Test Case
 */
class FormularTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FormularTable
     */
    public $Formular;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.formular',
        'app.screener',
        'app.module',
        'app.sections',
        'app.users',
        'app.userenrollment',
        'app.formular_operators',
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
        $config = TableRegistry::exists('Formular') ? [] : ['className' => 'App\Model\Table\FormularTable'];
        $this->Formular = TableRegistry::get('Formular', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Formular);

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
