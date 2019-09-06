<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrganisationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrganisationTable Test Case
 */
class OrganisationTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrganisationTable
     */
    public $Organisation;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Organisation'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Organisation') ? [] : ['className' => OrganisationTable::class];
        $this->Organisation = TableRegistry::getTableLocator()->get('Organisation', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Organisation);

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
