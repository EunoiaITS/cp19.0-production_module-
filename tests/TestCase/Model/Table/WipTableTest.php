<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WipTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WipTable Test Case
 */
class WipTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WipTable
     */
    public $Wip;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wip',
        'app.wip_section'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Wip') ? [] : ['className' => WipTable::class];
        $this->Wip = TableRegistry::get('Wip', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Wip);

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
