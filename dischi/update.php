<?php
// filepath: /home/plutone/Documents/visualstudio/restphpmysqli/dischi/update.php

// Inclusione degli headers e della connessione al database
include_once '../config/headers.php'; // Mi connetto al database
header("Access-Control-Allow-Methods: PUT"); // Metodo PUT

include_once '../config/database.php';

// Controllo della connessione
if ($conn->connect_errno) {
    echo json_encode(["message" => "Impossibile connettersi al server: " . $conn->connect_error]);
    exit;
}

// Decodifica del dato JSON ricevuto
$data = json_decode(file_get_contents("php://input"));

// Controllo che i dati necessari siano presenti
if (!empty($data->NRcatalogo) && !empty($data->Titolo) && !empty($data->Genere) && !empty($data->Interprete) && !empty($data->Etichetta)) {
    // Query SQL per aggiornare il disco
    $query = "UPDATE dischi 
              SET Titolo = '$data->Titolo', 
                  Genere = '$data->Genere', 
                  Interprete = '$data->Interprete', 
                  Etichetta = '$data->Etichetta' 
              WHERE NRcatalogo = '$data->NRcatalogo'";

    // Esecuzione della query
    if ($conn->query($query)) {
        // Controllo se è stato aggiornato un record
        if ($conn->affected_rows > 0) {
            http_response_code(200); // OK
            echo json_encode(["message" => "Disco aggiornato correttamente."]);
        } else {
            http_response_code(404); // Non trovato
            echo json_encode(["message" => "Nessun disco trovato con l'ID fornito."]);
        }
    } else {
        http_response_code(500); // Errore interno del server
        echo json_encode(["message" => "Errore durante l'aggiornamento del disco: " . $conn->error]);
    }
}//Non controllo se la rischiesta è incompleta

// Chiusura della connessione
$conn->close();
?>