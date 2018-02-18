<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WpTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WpTable Test Case
 */
class WpTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WpTable
     */
    public $Wp;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wp'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Wp') ? [] : ['className' => WpTable::class];
        $this->Wp = TableRegistry::get('Wp', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Wp);

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
