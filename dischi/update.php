<?php
// filepath: /home/plutone/Documents/visualstudio/restphpmysqli/dischi/update.php

// Inclusione degli headers e della connessione al database
include_once '../config/headers.php'; //mi connetto al database
header("Access-Control-Allow-Methods: PUT");//nota il metodo POST

include_once '../config/database.php';
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
    if (mysqli_query($conn, $query)) {
        http_response_code(200); // OK
        echo json_encode(array("message" => "Disco aggiornato correttamente."));
    } else {
        http_response_code(500); // Errore interno del server
        echo json_encode(array("message" => "Errore durante l'aggiornamento del disco."));
    }
}//non controllo se la richiesta e' errata

// Chiusura della connessione
mysqli_close($conn);
?>