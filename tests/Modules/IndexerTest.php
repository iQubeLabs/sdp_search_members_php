<?php

namespace SDPSearchTest\Modules;

use SDPSearchTest\TestCase;
use SDPSearch\Modules\Indexer;
use Mockery as m;

class IndexerTest extends TestCase
{
    protected $esClientMock;
    protected $indexer;

    protected function setUp()
    {
        parent::setUp();
        $this->esClientMock = m::mock('\ElasticSearch\Client');
        $this->indexer = new Indexer($this->esClientMock);
    }

    public function tearDown()
    {
        m::close();
    }

    public function testIndex()
    {
        $this->esClientMock->shouldReceive('index')
            ->once();

        $this->indexer->index('iqubers', 'members', []);
    }

    public function testIndexAll()
    {
        $this->esClientMock->shouldReceive('index')
            ->twice();

        $input = [
            [
                'name' => 'Perfect Makanju',
                'age' => 30,
            ],
            [
                'name' => 'James Fowe',
                'age' => 40,
            ],
        ];

        $this->indexer->indexAll('iqubers', 'members', $input);
    }
}
