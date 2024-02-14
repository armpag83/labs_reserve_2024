<?php
/* Gestione efficace dei dati
Classe che lavora come un DAO (Data Access Object), pattern architetturale per la gestione della persistenza che in PHP vengono dette PDO, acronimo ricorsivo che vuol dire PHP Data Objects.
Il costruttore si collega al database, i metodi interrogano la base di dati in modo parametrico (uso dei "prepared statement").
Una classe di questo tipo è di sola lettura (non presenta metodi set e costruttore con parametri).
*/
class DocentePDO extends PDO {
    private $codice;
    private $nome;
    private $cognome;
    private $password;

    public function __construct() {
        // Connessione al database "labsres"
        parent::__construct("mysql:host=localhost;dbname=labsres", "root", "");
    }

    public function get_by_codice($codice) {
        // il codice è passato come parametro, la query è costruita nel metodo per il recupero per chiave
		$stmt = $this->prepare("SELECT * FROM docente WHERE codice_docente = ?");
        $stmt->execute([$codice]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->codice = $row['codice_docente'];
            $this->nome = $row['nome'];
            $this->cognome = $row['cognome'];
            $this->password = $row['password'];
            return true;
        }

        return false;
    }

    public function get_by_codice_password($codice, $password) {
        // il codice e la password sono passati come parametri, la query è costruita nel metodo per il recupero della tupla
        $stmt = $this->prepare("SELECT * FROM docente WHERE codice_docente = ? AND password = ?");
        $stmt->execute([$codice, $password]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->codice = $row['codice_docente'];
            $this->nome = $row['nome'];
            $this->cognome = $row['cognome'];
            $this->password = $row['password'];
            return true;
        }

        return false;
    }

    // Metodi get per ottenere i valori degli attributi
    public function get_codice() {
        return $this->codice;
    }

    public function get_nome() {
        return $this->nome;
    }

    public function get_cognome() {
        return $this->cognome;
    }

    public function get_password() {
        return $this->password;
    }
}

// Esempio di utilizzo
$docente = new DocentePDO();

// Recupera il docente con il codice specificato
if ($docente->get_by_codice("AA001")) {
    echo "Codice: " . $docente->get_codice() . "<br>";
    echo "Nome: " . $docente->get_nome() . "<br>";
    echo "Cognome: " . $docente->get_cognome() . "<br>";
    echo "Password: " . $docente->get_password() . "<br>";
} else {
    echo "Docente non trovato.<br>";
}

// Recupera il docente con il codice e la password specificati
if ($docente->get_by_codice_password("AA001", "armpag83")) {
    echo "Codice: " . $docente->get_codice() . "<br>";
    echo "Nome: " . $docente->get_nome() . "<br>";
    echo "Cognome: " . $docente->get_cognome() . "<br>";
    echo "Password: " . $docente->get_password() . "<br>";
} else {
    echo "Docente non trovato.<br>";
}

?>
