<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DrTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DrTable Test Case
 */
class DrTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DrTable
     */
    public $Dr;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dr'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Dr') ? [] : ['className' => DrTable::class];
        $this->Dr = TableRegistry::get('Dr', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dr);

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
