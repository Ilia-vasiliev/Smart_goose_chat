<?php session_start();
require_once( "class/function_chat.php" );

$id_entry = trim(filter_var($_POST['id_entry'], FILTER_SANITIZE_STRING));

$something = new Chat(NULL); 
$something->connect();
$something->Autotification();
echo $something->Massage_Text($id_entry);

?>