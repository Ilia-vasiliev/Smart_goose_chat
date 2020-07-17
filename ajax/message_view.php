<?php session_start();
require_once( "class/function_chat.php" );

$something = new Chat(NULL); 
$something->connect();
$something->Autotification();
$something->Show_All_Message();

?>

