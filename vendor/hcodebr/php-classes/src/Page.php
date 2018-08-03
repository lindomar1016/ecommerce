<?php

namespace Hcode;

use Rain\Tpl;


class Page{

	private $tpl;
	private $defaults = [      //Configurações padroes
		"data" => []];
	private $options = [];

	public function  __construct($opts = array(), $tpl_dir = "/views/"){

		$this->options = array_merge($this->defaults, $opts); //mesclando novas opçoes recebidas com as padroes


		$config = array(
					"tpl_dir"       => $_SERVER['DOCUMENT_ROOT'].$tpl_dir, 			// local do template
					"cache_dir"     => $_SERVER['DOCUMENT_ROOT']."/views-cache/",		// pasta cache
					"debug"         => false // set to false to improve the speed
				   );

		Tpl::configure( $config );

		$this->tpl = new Tpl;

		$this->setData($this->options["data"]); //passar os dados para o template

		$this->tpl->draw("header"); //colocando na pagina o header.
	}

	private function setData($data = array()){
		foreach ($data as $key => $value) { //Percorrendo cada dado recebido ;
			$this->tpl->assign($key, $value);				 
		}
	}
	public function setTpl($name, $data = array(), $returnHTML = false){ //HTML que vai ser trabalhado

		$this->setData($data);

		return $this->tpl->draw($name, $returnHTML);
	}


	public function __destruct(){

		$this->tpl->draw("footer"); //colocando o footer na pagina

	}



}
?>