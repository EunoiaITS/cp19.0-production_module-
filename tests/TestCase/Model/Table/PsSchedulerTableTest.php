<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PsSchedulerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PsSchedulerTable Test Case
 */
class PsSchedulerTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PsSchedulerTable
     */
    public $PsScheduler;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ps_scheduler',
        'app.so_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PsScheduler') ? [] : ['className' => PsSchedulerTable::class];
        $this->PsScheduler = TableRegistry::get('PsScheduler', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PsScheduler);

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
