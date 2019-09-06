<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SizeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SizeTable Test Case
 */
class SizeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SizeTable
     */
    public $Size;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Size'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Size') ? [] : ['className' => SizeTable::class];
        $this->Size = TableRegistry::getTableLocator()->get('Size', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Size);

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
