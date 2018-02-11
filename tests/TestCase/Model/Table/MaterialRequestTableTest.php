<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaterialRequestTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaterialRequestTable Test Case
 */
class MaterialRequestTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MaterialRequestTable
     */
    public $MaterialRequest;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.material_request'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MaterialRequest') ? [] : ['className' => MaterialRequestTable::class];
        $this->MaterialRequest = TableRegistry::get('MaterialRequest', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MaterialRequest);

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
