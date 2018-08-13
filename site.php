<?php

use Hcode\Page;
use Hcode\Model\Product;
use Hcode\Model\Category;

$app->get('/', function() { //MONTANDO ROTA TEMPLATE SITE
    
    Category::updateFile();


    $products = Product::listAll();
  
	$page = new Page();
	$page->setTpl("index",[
		"products"=>Product::checkList($products)
	]);
	
});

?>