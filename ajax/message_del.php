<?php session_start();

if (isset($_SESSION['id_user'])){
	require_once( "class/function_chat.php" );

	$id_entry = trim(filter_var($_POST['id_entry'], FILTER_SANITIZE_STRING));

	$something = new Chat(NULL); 
	$something->connect();
	$something->Autotification();
	$something->Massage_Delete ($id_entry);
}

?>