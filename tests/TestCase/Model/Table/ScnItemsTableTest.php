<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ScnItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ScnItemsTable Test Case
 */
class ScnItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ScnItemsTable
     */
    public $ScnItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.scn_items',
        'app.scns'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ScnItems') ? [] : ['className' => ScnItemsTable::class];
        $this->ScnItems = TableRegistry::get('ScnItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ScnItems);

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
