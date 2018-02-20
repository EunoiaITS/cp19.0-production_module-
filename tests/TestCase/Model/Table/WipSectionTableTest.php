<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WipSectionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WipSectionTable Test Case
 */
class WipSectionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WipSectionTable
     */
    public $WipSection;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wip_section',
        'app.wips'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WipSection') ? [] : ['className' => WipSectionTable::class];
        $this->WipSection = TableRegistry::get('WipSection', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WipSection);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
