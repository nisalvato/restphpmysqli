<?php

//Restituisce il formato JSON
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");//nota il metodo POST

include_once '../config/database.php'; //mi connetto al database

// Controllo della connessione e restituzione di un errore in caso di fallimento
if ($conn->connect_errno) {
    echo json_encode(["message" => "Impossibile connettersi al server: " . $conn->connect_error]);
    exit;
}

// Decodifica del dato JSON ricevuto
$data = json_decode(file_get_contents("php://input"));

// Controllo che i dati necessari siano presenti
if (!empty($data->NRcatalogo) && !empty($data->Titolo) && !empty($data->Genere) && !empty($data->Interprete) && !empty($data->Etichetta)) {
    // Query SQL per inserire il disco 
    $query = "INSERT INTO dischi (NRcatalogo, Titolo, Genere, Interprete, Etichetta) 
              VALUES ('$data->NRcatalogo', '$data->Titolo', '$data->Genere', '$data->Interprete', '$data->Etichetta')";

    // Esecuzione della query
    if ($conn->query($query)) {
        http_response_code(201); // codice rhttp restituito: creazione completata
        echo json_encode(["message" => "Disco creato correttamente."]);
    } else {
        http_response_code(500); // Errore interno del server
        echo json_encode(["message" => "Errore durante la creazione del disco: " . $conn->error]);
    }
}//Non controllo se i dati sono incompleti

// Chiusura della connessione
$conn->close();
?>