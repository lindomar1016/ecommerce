<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() { //MONTANDO ROTA TEMPLATE SITE
    
	$page = new Page();
	$page->setTpl("index");
	
});


$app->get('/admin', function() { //MONTANDO ROTA TEMPLATE PAGINA ADMIN
    
	$page = new PageAdmin();
	$page->setTpl("index");
	
});

$app->run();

 ?>