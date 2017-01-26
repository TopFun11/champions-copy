<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfileTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfileTable Test Case
 */
class ProfileTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProfileTable
     */
    public $Profile;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.profile',
        'app.users',
        'app.module',
        'app.screener',
        'app.question',
        'app.exercise',
        'app.sections',
        'app.recordset',
        'app.record',
        'app.question_option',
        'app.formular',
        'app.formular_operators',
        'app.formular_variables',
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
        $config = TableRegistry::exists('Profile') ? [] : ['className' => 'App\Model\Table\ProfileTable'];
        $this->Profile = TableRegistry::get('Profile', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Profile);

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
