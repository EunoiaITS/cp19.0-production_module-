<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MitTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MitTable Test Case
 */
class MitTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MitTable
     */
    public $Mit;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mit'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Mit') ? [] : ['className' => MitTable::class];
        $this->Mit = TableRegistry::get('Mit', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mit);

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
