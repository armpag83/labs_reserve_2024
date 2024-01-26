<?php
	// settaggio dell'header http per il formato corretto
	header("Content-Type: application/json");

	/* costruisco un array associativo */
	/* TODO: recuperare i parametri dal database con la query corretta */
	$docente = array();
	$docente['codice_docente'] = 'BBBCCCqualcosa';
	$docente['nome'] = 'Mimmo';
	$docente['cognome'] = 'Speranza';

	echo json_encode($docente);
	// la variabile $spedizione_json può essere inviata ad un server esterno, ad esempio al magazzino spedizioni
?>
