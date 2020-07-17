<?php session_start();

if (isset($_SESSION['id_user'])){
	require_once( "class/function_chat.php" );

	$massage = trim(filter_var($_POST['massage'], FILTER_SANITIZE_STRING));

	$something = new Chat(NULL); 
	$something->connect();
	$something->Autotification();
	$something->Add_Message_User($massage);
}

?>