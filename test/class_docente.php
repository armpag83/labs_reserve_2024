<?php
// Definizione di una classe Docente per la gestione degli attributi
class Docente {
    private $codice;
    private $nome;
    private $cognome;

    // Costruttore
    public function __construct($codice, $nome, $cognome) {
        $this->codice = $codice;
        $this->nome = $nome;
        $this->cognome = $cognome;
    }

    // Metodi get
    public function getCodice() {
        return $this->codice;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCognome() {
        return $this->cognome;
    }

    // Metodi set
    public function setCodice($codice) {
        $this->codice = $codice;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCognome($cognome) {
        $this->cognome = $cognome;
    }
	
	// Metodo per la serializzazione in XML
    public function toXML() {
        $xml = new SimpleXMLElement('<docente></docente>');
        $xml->addChild('codice_docente', $this->codice);
        $xml->addChild('nome', $this->nome);
        $xml->addChild('cognome', $this->cognome);
        return $xml->asXML();
    }
	
    public function toArray() {
		$temp = array(
			'codice_docente' => $this->codice,
			'nome' => $this->nome,
			'cognome' => $this->cognome
		);
		return $temp;
    }

	// Metodo per la serializzazione in JSON
    public function toJSON() {
		return json_encode($this->toArray());
    }

}

?>
