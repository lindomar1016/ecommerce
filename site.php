<?php

use Hcode\Page;

$app->get('/', function() { //MONTANDO ROTA TEMPLATE SITE
    
    Category::updateFile();

	$page = new Page();
	$page->setTpl("index");
	
});

?>