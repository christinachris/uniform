<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrdersVariantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrdersVariantsTable Test Case
 */
class OrdersVariantsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrdersVariantsTable
     */
    public $OrdersVariants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OrdersVariants',
        'app.Orders',
        'app.Variants',
        'app.Carts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OrdersVariants') ? [] : ['className' => OrdersVariantsTable::class];
        $this->OrdersVariants = TableRegistry::getTableLocator()->get('OrdersVariants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrdersVariants);

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
