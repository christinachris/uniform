<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UniformcoloursizeFixture
 */
class UniformcoloursizeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'uniformcoloursize';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'u_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'c_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        's_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'stock' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'c_id' => ['type' => 'index', 'columns' => ['c_id'], 'length' => []],
            's_id' => ['type' => 'index', 'columns' => ['s_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['u_id', 'c_id', 's_id'], 'length' => []],
            'uniformcoloursize_ibfk_1' => ['type' => 'foreign', 'columns' => ['u_id'], 'references' => ['uniform', 'u_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'uniformcoloursize_ibfk_2' => ['type' => 'foreign', 'columns' => ['c_id'], 'references' => ['color', 'c_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'uniformcoloursize_ibfk_3' => ['type' => 'foreign', 'columns' => ['s_id'], 'references' => ['size', 's_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'u_id' => 1,
                'c_id' => 1,
                's_id' => 1,
                'stock' => 1
            ],
        ];
        parent::init();
    }
}
