<?php
// Access-Control-Allow-Headers
// Headers
include_once '../config/headers.php'; //mi connetto al database
header("Access-Control-Allow-Methods: GET");//nota il metodo POST

include_once '../config/database.php';

// Controllo della connessione
if ($conn->connect_errno) {
    echo "Impossibile connettersi al server: " . $conn->connect_error . "\n";
    exit;
}

// Query per ottenere i dischi
$query = "SELECT NRcatalogo, Genere, Interprete, Titolo, Etichetta FROM dischi";
$result = $conn->query($query);

// Controllo del risultato della query
if ($result && $result->num_rows > 0) { 
    // Iterazione sui risultati e creazione diretta dell'array
    $arr_dischi = ["records" => []];
    while ($row = $result->fetch_assoc()) {
        //Il metodo fetch_assoc()   restituisce un array associativo
        //se dovessi fare una stampa dovrei fare in questo modo echo "Titolo: " . $row["Titolo"]
        //A Noi invece serve un array associativo in cui le chiavi sono i nomi delle colonne
        //e i valori sono i dati delle righe ma fatto da diverse righe
        //Questo array associativo e' appunto array dischi
        $arr_dischi["records"][] = $row;
    }
    //Converoto poi array dischi in formato JSON con json_encode
    //e lo restituisco come risposta
    echo json_encode($arr_dischi);
} else {
    echo json_encode(["message" => "Nessun disco trovato."]);
}

// Chiudo la connessione
$result->free(); 
$conn->close();
?>

