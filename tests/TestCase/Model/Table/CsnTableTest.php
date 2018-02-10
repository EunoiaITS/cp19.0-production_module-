<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CsnTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CsnTable Test Case
 */
class CsnTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CsnTable
     */
    public $CsnTable;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Csn') ? [] : ['className' => CsnTable::class];
        $this->CsnTable = TableRegistry::get('Csn', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CsnTable);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
