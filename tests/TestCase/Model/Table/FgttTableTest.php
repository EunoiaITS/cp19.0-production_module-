<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FgttTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FgttTable Test Case
 */
class FgttTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FgttTable
     */
    public $Fgtt;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fgtt'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fgtt') ? [] : ['className' => FgttTable::class];
        $this->Fgtt = TableRegistry::get('Fgtt', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fgtt);

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
