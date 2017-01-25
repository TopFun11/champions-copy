<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ExerciseController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ExerciseController Test Case
 */
class ExerciseControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exercise',
        'app.sections',
        'app.module',
        'app.screener',
        'app.question',
        'app.question_option',
        'app.formular',
        'app.formular_operators',
        'app.formular_variables',
        'app.users',
        'app.userenrollment',
        'app.recordset',
        'app.record'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
