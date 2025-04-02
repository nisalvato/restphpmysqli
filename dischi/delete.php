<?php
// Headers
include_once '../config/headers.php'; //mi connetto al database
header("Access-Control-Allow-Methods: DELETE");//nota il metodo POST

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
    echo json_encode(["message" => "ID mancante."]);
    exit;
}

// Query per eliminare il disco
$query = "DELETE FROM dischi WHERE NRcatalogo = '$data->NRcatalogo'";

// Esecuzione della query
if (mysqli_query($conn, $query)) {
    // Controllo se è stato eliminato un record
    if (mysqli_affected_rows($conn) > 0) {
        echo json_encode(["message" => "Disco eliminato con successo."]);
    } else {
        echo json_encode(["message" => "Nessun disco trovato con l'ID fornito."]);
    }
} else {
    echo json_encode(["message" => "Errore durante l'eliminazione del disco: " . $conn->error]);
}

// Chiudo la connessione
$conn->close();
?>
