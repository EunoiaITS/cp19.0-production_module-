<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NbdoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NbdoTable Test Case
 */
class NbdoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NbdoTable
     */
    public $Nbdo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nbdo',
        'app.nbdo_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Nbdo') ? [] : ['className' => NbdoTable::class];
        $this->Nbdo = TableRegistry::get('Nbdo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nbdo);

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
