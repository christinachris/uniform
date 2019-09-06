<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WebsitecontentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WebsitecontentsTable Test Case
 */
class WebsitecontentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WebsitecontentsTable
     */
    public $Websitecontents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Websitecontents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Websitecontents') ? [] : ['className' => WebsitecontentsTable::class];
        $this->Websitecontents = TableRegistry::getTableLocator()->get('Websitecontents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Websitecontents);

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
