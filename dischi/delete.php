<?php
//Restituisce il formato JSON
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE"); // Metodo DELETE

include_once '../config/database.php';

// Controllo della connessione
if ($conn->connect_errno) {
    echo json_encode(["message" => "Impossibile connettersi al server: " . $conn->connect_error]);
    exit;
}

// Recupero dei dati dalla richiesta
$data = json_decode(file_get_contents("php://input"));

// Controllo che l'ID sia stato fornito
if (!isset($data->NRcatalogo)) {
    http_response_code(400); // Richiesta errata
    echo json_encode(["message" => "ID mancante."]);
    exit;
}

// Query per eliminare il disco
$query = "DELETE FROM dischi WHERE NRcatalogo = '$data->NRcatalogo'";

// Esecuzione della query
if ($conn->query($query)) {
    // Controllo se è stato eliminato un record
    if ($conn->affected_rows > 0) {
        http_response_code(200); // OK
        echo json_encode(["message" => "Disco eliminato con successo."]);
    } else {
        http_response_code(404); // Non trovato
        echo json_encode(["message" => "Nessun disco trovato con l'ID fornito."]);
    }
}//Non controllo se ci sono errori di sintassi nella query
// Chiudo la connessione
$conn->close();
?>
