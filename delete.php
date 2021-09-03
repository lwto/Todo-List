<?php

var_dump($_POST);

$json = file_get_contents('todo.json');
$jsonArray = json_decode($json, true);



$todoName = $_POST['todo_name'];
unset($jsonArray[$todoName]);

file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));

header('location: index.php');
