<?php

namespace SDPSearch;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Application
{
    protected static $instance;
    protected $slimApp;

    public static function init($slimApp)
    {
        self::$instance = new static();
        self::$instance->slimApp = $slimApp;
        self::$instance->loadRoutes();
        self::$instance->getSlimApp()->run();
    }

    public static function instance()
    {
        return self::$instance;
    }

    public function getSlimApp()
    {
        return $this->slimApp;
    }

    protected function loadRoutes()
    {
        $this->slimApp->get('/index', function (Request $request, Response $response) {
            $response->getBody()->write('For now, just upload the csv file. with the name \'file\' :)');

            return $response;
        });

        $this->slimApp->post('/index', function (Request $request, Response $response) {
            $files = $request->getUploadedFiles();
            if (empty($files['file'])) {
                throw new Exception('Expected a newfile');
            }

            $csvFile = $files['file'];
            var_dump($csvFile);

            if ($csvFile->getError() === UPLOAD_ERR_OK) {
                $uploadFileName = $csvFile->getClientFilename();
        //		$csvFile->moveTo('uploads/'.$uploadFileName);
            }

            return $response;
        });
    }
}
