<?php session_start();
require_once( "class/function_chat.php" );

if (isset($_SESSION['id_user'])){
	$massage = trim(filter_var($_POST['massage'], FILTER_SANITIZE_STRING));
	$id_entry = trim(filter_var($_POST['id_entry'], FILTER_SANITIZE_STRING));

	$something = new Chat(NULL); 
	$something->connect();
	$something->Autotification();
	$something->Edit_Message_User($massage, $id_entry);
}

?>