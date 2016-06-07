<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PostTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PostTable Test Case
 */
class PostTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PostTable
     */
    public $Post;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.post',
        'app.category',
        'app.users',
        'app.bookmarks',
        'app.tags',
        'app.bookmarks_tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Post') ? [] : ['className' => 'App\Model\Table\PostTable'];
        $this->Post = TableRegistry::get('Post', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Post);

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
