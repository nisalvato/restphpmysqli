<?php
// Access-Control-Allow-Headers
include_once '../config/header.php';
include_once '../config/database.php';

// Controllo della connessione
if (!$conn) {
    http_response_code(500); // Errore interno del server
    echo json_encode(array("message" => "Errore di connessione al database."));
    exit();
}

// Decodifica del dato JSON ricevuto
$data = json_decode(file_get_contents("php://input"));

// Controllo che i dati necessari siano presenti
if (!empty($data->NRcatalogo) && !empty($data->Titolo) && !empty($data->Genere) && !empty($data->Interprete) && !empty($data->Etichetta)) {
    // Query SQL per inserire il disco (senza escaping)
    $query = "INSERT INTO dischi (NRcatalogo, Titolo, Genere, Interprete, Etichetta) 
              VALUES ('$data->NRcatalogo', '$data->Titolo', '$data->Genere', '$data->Interprete', '$data->Etichetta')";

    // Esecuzione della query
    if (mysqli_query($conn, $query)) {
        http_response_code(201); // Creazione completata
        echo json_encode(array("message" => "Disco creato correttamente."));
    } else {
        http_response_code(503); // Servizio non disponibile
        echo json_encode(array("message" => "Impossibile creare il disco."));
    }
} else {
    http_response_code(400); // Richiesta errata
    echo json_encode(array("message" => "Impossibile creare il disco, i dati sono incompleti."));
}

// Chiusura della connessione
mysqli_close($conn);
?>