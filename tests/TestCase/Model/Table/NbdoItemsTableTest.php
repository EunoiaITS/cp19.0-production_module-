<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NbdoItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NbdoItemsTable Test Case
 */
class NbdoItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NbdoItemsTable
     */
    public $NbdoItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nbdo_items',
        'app.nbdos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('NbdoItems') ? [] : ['className' => NbdoItemsTable::class];
        $this->NbdoItems = TableRegistry::get('NbdoItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NbdoItems);

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
