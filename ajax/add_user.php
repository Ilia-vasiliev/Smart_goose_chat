<?php session_start();

require_once( "class/function_chat.php" );

$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));

$something = new Chat($login); 
$something->connect();
$something->Add_User();
$something->Autotification();

$_SESSION['id_user'] = $something->id_user;

echo "on";

?>
