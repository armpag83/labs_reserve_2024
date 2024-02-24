<html>
<body>
<script>

async function chiama() { 
	
	let response = await fetch('json_docente_singolo.php');

//	let text = await response.text(); // legge il body della risposta come testo
	let json = await response.json();

//	alert(text);
	alert(json.codice_docente+": "+json.nome+" "+json.cognome);
}

</script>

<button onclick="chiama()">AAAA</button>

</body>
</html>