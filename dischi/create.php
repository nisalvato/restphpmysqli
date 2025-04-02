<?php
// Access-Control-Allow-Headers

include_once '../config/headers.php'; //mi connetto al database
header("Access-Control-Allow-Methods: POST");//nota il metodo POST

include_once '../config/database.php'; //mi connetto al database

// Controllo della connessione e restituzione di un errore in caso di fallimento
//l'errore e' codificato in json
if (!$conn) {
    http_response_code(500); // codice rhttp restituito: Errore interno del server
    echo json_encode(array("message" => "Errore di connessione al database."));
    exit();//Se questa istruzione viene eseguita, si esce dalla pagina e il resto non viene eseguito
}

// Decodifica del dato JSON ricevuto
$data = json_decode(file_get_contents("php://input"));

// Controllo che i dati necessari siano presenti
if (!empty($data->NRcatalogo) && !empty($data->Titolo) && !empty($data->Genere) && !empty($data->Interprete) && !empty($data->Etichetta)) {
    // Query SQL per inserire il disco 
    $query = "INSERT INTO dischi (NRcatalogo, Titolo, Genere, Interprete, Etichetta) 
              VALUES ('$data->NRcatalogo', '$data->Titolo', '$data->Genere', '$data->Interprete', '$data->Etichetta')";

    // Esecuzione della query
    if (mysqli_query($conn, $query)) {
        http_response_code(201); // codice rhttp restituito: creazione completata
        echo json_encode(array("message" => "Disco creato correttamente."));
    }//Qui andrebbe fatto un else per inviare il messaggio in caso di query errata

} else {
    http_response_code(400); // Richiesta errata
    echo json_encode(array("message" => "Impossibile creare il disco, i dati sono incompleti."));
}

// Chiusura della connessione
mysqli_close($conn);
?>