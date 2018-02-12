<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrnTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrnTable Test Case
 */
class PrnTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PrnTable
     */
    public $Prn;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prn'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Prn') ? [] : ['className' => PrnTable::class];
        $this->Prn = TableRegistry::get('Prn', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Prn);

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
