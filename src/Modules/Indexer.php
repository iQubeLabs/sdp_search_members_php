<?php

namespace SDPSearch\Modules;

class Indexer {

	protected $esClient;

	public function __construct(\ElasticSearch\Client $esClient) {
		$this->esClient = $esClient;
	}

	/**
	 * Index inputData into index, type using mapping
	 *
	 * @param string $index
	 * @param string $type
	 * @param array $inputData
	 * @param array|null $mapping
	 * @return array
	 */
	public function index($index, $type, $inputData, $mapping = null) {
		
	}

	/**
	 * Index all inputData into index, type using mapping
	 *
	 * @param string $index
	 * @param string $type
	 * @param array $inputData
	 * @param array|null $mapping
	 * @return array
	 */
	public function indexAll($index, $type, $inputData, $mapping = null) {

	}
}
