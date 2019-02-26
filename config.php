<?php
	/* Basicamente as duas formas trabalhão da seguinte forma, toda vez que uma classe for usada será chamada uma função de autoload que receberá o nome dessa classe como argumento, assim, com esse nome nós podemos fazer a inclusão da classe de acordo com o caminho dela dentro do sistema */
	spl_autoload_register(function($class_name){
		//A classe a ser procurada está no diretório class;
		/* DIRECTORY_SEPARATOR, está relacionado ao separador / no UNIX e \ no Windows */
		$filename = "class".DIRECTORY_SEPARATOR.$class_name.".php";
		if(file_exists($filename)){
			require_once($filename);
		}
	});
?>