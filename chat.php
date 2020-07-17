<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style_chat.css">
</head>
<body>
	<div class="wrapper">
	  <nav class="nav" id="nav">
	    <div class="default-nav">
	      <div class="main-nav">
	      </div>
	    </div>
	  </nav>
	  <a class="close" href="#">Покинуть чат X</a>
	  <div class="inner" id="inner">
	    <div class="content" id="content">
	    </div>
	  </div>
	  <div class="bottom" id="bottom">
	    <textarea class="input" id="input"></textarea>
	    <div class="send" id="send"></div>
	    <div class="send send_edit" id="send_edit"></div>
	  </div>
	</div>
</body>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/ajax_chat.js"></script>
</html>