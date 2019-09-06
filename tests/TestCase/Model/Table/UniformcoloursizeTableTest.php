<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UniformcoloursizeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UniformcoloursizeTable Test Case
 */
class UniformcoloursizeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UniformcoloursizeTable
     */
    public $Uniformcoloursize;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Uniformcoloursize',
        'app.Uniform',
        'app.Color',
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
        $config = TableRegistry::getTableLocator()->exists('Uniformcoloursize') ? [] : ['className' => UniformcoloursizeTable::class];
        $this->Uniformcoloursize = TableRegistry::getTableLocator()->get('Uniformcoloursize', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Uniformcoloursize);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
