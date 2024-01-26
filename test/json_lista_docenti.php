<?php
	// settaggio dell'header http per il formato corretto
	header("Content-Type: application/json");
	include 'class_docente.php';

	/* TODO: recuperare i parametri dal database con la query corretta */

	/* Costruzione oggetto docente */
	$docente1 = new Docente('CCCBBB00A00H777X', 'Babbo', 'Cocco');
	$docente2 = new Docente('GGGCCC33A00H777X', 'Ciccio', 'Gaggo');
	
	$docenti = array();
	$docenti[0] = $docente1->toArray();
	$docenti[1] = $docente2->toArray();	
	
	/* converto l'oggetto in JSON */
	echo (json_encode($docenti));
?>
