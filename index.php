<?php

require('vendor/autoload.php');

use SDPSearch\Application;

//$client = \ElasticSearch\ClientBuilder::create()->build();

$indexer = new SDPSearch\Modules\Indexer;

Application::init(new \Slim\App);
