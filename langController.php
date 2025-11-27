<?php

	require "langModel.php";
	require "langService.php";
	require "conexao.php";


	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if($acao == 'create' ) {
		$language = new Language();
		$language->__set('language', $_POST['language']);

		$conexao = new Connect();

		$languageService = new LangService($conexao, $language);
		$languageService->create();

		header('Location: create_language.php?inclusao=1');
	
	} else if($acao == 'read') {
		
		$language = new Language();
		$conexao = new Connect();

		$languageService = new LangService($conexao, $language);
		$languages = $languageService->read();
	
	} else if($acao == 'update') {

		$language = new Language();
		$language->__set('id', $_POST['id'])
			->__set('language', $_POST['language']);

		$conexao = new Connect();

		$languageService = new LangService($conexao, $language);
		if($languageService->update()) {
			
			if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
				header('location: index.php');	
			} else {
				header('location: todas_languages.php');
			}
		}


	} else if($acao == 'remover') {

		$language = new Language();
		$language->__set('id', $_GET['id']);

		$conexao = new Connect();

		$languageService = new LangService($conexao, $language);
		$languageService->remover();

		if( isset($_GET['pag']) && $_GET['pag'] == 'index') {
			header('location: index.php');	
		} else {
			header('location: todas_languages.php');
		}
	
	}

?>