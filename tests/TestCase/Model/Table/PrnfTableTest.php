<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrnfTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrnfTable Test Case
 */
class PrnfTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PrnfTable
     */
    public $Prnf;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prnf'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Prnf') ? [] : ['className' => PrnfTable::class];
        $this->Prnf = TableRegistry::get('Prnf', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Prnf);

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
