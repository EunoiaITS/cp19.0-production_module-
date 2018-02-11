<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MrItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MrItemsTable Test Case
 */
class MrItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MrItemsTable
     */
    public $MrItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mr_items',
        'app.mrs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MrItems') ? [] : ['className' => MrItemsTable::class];
        $this->MrItems = TableRegistry::get('MrItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MrItems);

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
