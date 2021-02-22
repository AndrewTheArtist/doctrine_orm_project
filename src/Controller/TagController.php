<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class TagController extends Controller
{
	public function view(Request $request, Response $response, $args = [])
    {
    	$qb = $this->ci->get('db')->createQueryBuilder();

    	return $this->renderPage($response, 'tag.html', [
        	'tag' => $tag,
        	'articles' => $articles
        ]);

    }
}