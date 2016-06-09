<?php

namespace SDPSearchTest\Modules;

use SDPSearchTest\TestCase;
use SDPSearch\Modules\Searcher;
use \Mockery as m;


class SearcherTest extends TestCase {

	protected $esClientMock;
	protected $searcher;

	protected function setUp() {
		parent::setUp();
		$this->esClientMock = m::mock('\ElasticSearch\Client');
		$this->searcher = new Searcher($this->esClientMock);
	}

	public function tearDown() {
		m::close();
	}

	public function testSimpleSearch() {
		$this->esClientMock->shouldReceive('search')
			->once();

		$query = '';

		$this->searcher->simpleSearch('iqubers', 'members', $query);
	}

	public function testSearch() {
		$this->esClientMock->shouldReceive('search')
			->once();

		$query = [
        	'query' => [
            	'match' => [
                	'name' => 'Perfect Makanju',
            	]
        	]
        ];

		$this->searcher->search('iqubers', 'members', $query);
	}
}
