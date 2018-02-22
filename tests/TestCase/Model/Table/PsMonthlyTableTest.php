<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PsMonthlyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PsMonthlyTable Test Case
 */
class PsMonthlyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PsMonthlyTable
     */
    public $PsMonthly;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ps_monthly'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PsMonthly') ? [] : ['className' => PsMonthlyTable::class];
        $this->PsMonthly = TableRegistry::get('PsMonthly', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PsMonthly);

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
