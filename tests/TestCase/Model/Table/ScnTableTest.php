<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ScnTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ScnTable Test Case
 */
class ScnTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ScnTable
     */
    public $Scn;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.scn',
        'app.scn_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Scn') ? [] : ['className' => ScnTable::class];
        $this->Scn = TableRegistry::get('Scn', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Scn);

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
