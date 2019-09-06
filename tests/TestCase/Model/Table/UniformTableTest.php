<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UniformTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UniformTable Test Case
 */
class UniformTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UniformTable
     */
    public $Uniform;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Uniform',
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
        $config = TableRegistry::getTableLocator()->exists('Uniform') ? [] : ['className' => UniformTable::class];
        $this->Uniform = TableRegistry::getTableLocator()->get('Uniform', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Uniform);

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
