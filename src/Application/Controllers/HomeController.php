<?php
declare(strict_types=1);

namespace App\Application\Controllers;

use Psr\Container\ContainerInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;


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
}
