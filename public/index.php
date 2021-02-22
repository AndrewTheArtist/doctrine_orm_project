<?php

use App\Service\DatabaseFactory;
use App\Service\Templating;
use DI\Container;
use Slim\Factory\AppFactory;

require('../vendor/autoload.php');

// register services
$container = new Container();

$container->set('db', function(){
	return DatabaseFactory::create();
});

$container->set('templating', function() {
    return new Templating;
});

AppFactory::setContainer($container);

// initialise application
$app = AppFactory::create();

// define page routes
$app->get('/article/{slug}', '\App\Controller\ArticleController:view');
$app->get('/', '\App\Controller\DefaultController:homepage');
$app->get('/admin', '\App\Controller\AdminController:view');
$app->any('/admin/create', '\App\Controller\AdminController:create');
$app->any('/admin/{id}', '\App\Controller\AdminController:edit');
$app->get('/author/{id}', '\App\Controller\AuthorController:author');
$app->get('/tag', '\App\Controller\TagController:view');

// finish
$app->run();
/*
INSERT INTO `Tags` (`id`, `name`) VALUES
(1, 'Ashley Galvin'),
(2, 'Patrick Beach'),
(3, 'Patrick Beach'),
(4, 'Patrick Beach'),
(5, 'Patrick Beach'),
(6, 'Patrick Beach'),
(7, 'Patrick Beach'),
(8, 'Patrick Beach'),
(9, 'MacKenzie Miller')

*/
