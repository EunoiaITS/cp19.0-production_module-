<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SerialNumberChildTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SerialNumberChildTable Test Case
 */
class SerialNumberChildTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SerialNumberChildTable
     */
    public $SerialNumberChild;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.serial_number_child',
        'app.serial_numbers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SerialNumberChild') ? [] : ['className' => SerialNumberChildTable::class];
        $this->SerialNumberChild = TableRegistry::get('SerialNumberChild', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SerialNumberChild);

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
