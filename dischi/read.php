<?php
// Access-Control-Allow-Headers
include_once '../config/header.php';
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
    // Creazione diretta dell'array dei record
    $arr_dischi = ["records" => $result->fetch_all(MYSQLI_ASSOC)];
//oppure $arr_dischi = array("records" => $array_dei_dischi);

    echo json_encode($arr_dischi);
} else {
    echo json_encode(["message" => "Nessun disco trovato."]);
}

// Chiudo la connessione
$conn->close();
?>

