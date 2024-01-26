<?php
	// settaggio dell'header http per il formato corretto
	header("Content-Type: application/xml");
	include 'class_docente.php';

	/* TODO: recuperare i parametri dal database con la query corretta */

	/* Costruzione oggetto docente */
	$docente1 = new Docente('CCCBBB00A00H777X', 'Babbo', 'Cocco');
	
	/* converto l'oggetto in XML */
	echo ($docente1->toXML());
?>
