<?php

namespace SDPSearch\Modules;

class Searcher {

	protected $esClient;

	public function __construct(\ElasticSearch\Client $esClient) {
		$this->esClient = $esClient;
	}

	/**
	 * Search an index and type using simple query
	 *
	 * @param string $index
	 * @param string $type
	 * @return
	 */
	public function simpleSearch($index, $type, $query) {
		
	}

	/**
	 * Search an index and type using elastic search query dsl object
	 *
	 * @param string $index
	 * @param string $type
	 * @return
	 */
	public function search($index, $type, array $esqQuery) {

	}
}
