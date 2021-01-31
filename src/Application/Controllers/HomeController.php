<?php
declare(strict_types=1);

namespace App\Application\Controllers;

use Psr\Container\ContainerInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Psr7\UploadedFile;
use AlfredDagenais\WordCountUtf8;


class HomeController {
    public function __construct(ContainerInterface $container ) {
        $this->settings = $container->get('settings');
        $this->view = $container->get('view');

    }
    
    public function index(Request $request, Response $response, $args): Response {
        $this->view->render(
            $response, 'index.twig', $args
        );
        return $response;
    }

    public function count(Request $request, Response $response, $args): Response {
        $file = current($request->getUploadedFiles());
        $filePath = $file->getFilePath();
        $words = file_get_contents($filePath);
        $args['wordCount'] = WordCountUtf8::getWordCount($words);
        $this->view->render(
            $response, 'count.twig', $args
        );
        return $response;
    }
}
