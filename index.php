<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() { //MONTANDO ROTA TEMPLATE SITE
    
	$page = new Page();
	$page->setTpl("index");
	
});


$app->get('/admin', function() { //MONTANDO ROTA TEMPLATE PAGINA ADMIN

    User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("index");
	
});

$app->get('/admin/login', function() { //MONTANDO ROTA TEMPLATE PAGINA LOGIN ADMIN
  
	$page = new PageAdmin([
		"header" => false,
		"foote"  => false]);

	$page->setTpl("login");
	
});

$app->post('/admin/login', function() { //LOGANDO USUARIO
    
    User::login($_POST["login"], $_POST["password"]);

    header("Location: /admin");

	exit;
});

$app->get('/admin/logout', function(){

	User::logout();
	header("Location: /admin/login");

	exit;
});

$app->run();

 ?>