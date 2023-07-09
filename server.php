<?php 
// Recupero il contenuto del file "todo_list.json"
$string = file_get_contents('data/todo_list.json');
// Converto il contenuto in un array in PHP
$array = json_decode($string, true);

// Verifico se è stata inviata una richiesta POST con il campo "todoItem"
if(isset($_POST['todoItem'])){
    // Creo un nuovo task con il testo fornito e lo stato "done" impostato su falso
    $task = [
        'text' => $_POST['todoItem'],
        'done' => false
    ];   
    // Aggiungo il nuovo task all'array
    array_push($array, $task);

    // Converto l'array in formato JSON
    $array_encodet = json_encode($array);

    // Sovrascrivo il contenuto del file "todo_list.json" con il nuovo array JSON
    file_put_contents('data/todo_list.json', $array_encodet);
}

// Imposto l'header per indicare che il contenuto della risposta è in formato JSON
header('Content-Type: application/json');
// Restituisco l'array come risposta JSON
echo json_encode($array);
?>
