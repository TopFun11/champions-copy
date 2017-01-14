<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FormularVariablesFixture
 *
 */
class FormularVariablesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'formular_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'question_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'formular_id' => ['type' => 'index', 'columns' => ['formular_id'], 'length' => []],
            'question_id' => ['type' => 'index', 'columns' => ['question_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'formular_variables_ibfk_1' => ['type' => 'foreign', 'columns' => ['formular_id'], 'references' => ['formular', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'formular_variables_ibfk_2' => ['type' => 'foreign', 'columns' => ['question_id'], 'references' => ['question', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'formular_id' => 1,
            'question_id' => 1
        ],
    ];
}
