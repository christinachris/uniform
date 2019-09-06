<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UniformsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UniformsTable Test Case
 */
class UniformsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UniformsTable
     */
    public $Uniforms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Uniforms',
        'app.Organisations',
        'app.Pictures',
        'app.Variants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Uniforms') ? [] : ['className' => UniformsTable::class];
        $this->Uniforms = TableRegistry::getTableLocator()->get('Uniforms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Uniforms);

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
