$(document).ready(function() {
		$.ajax({
			url: 'ajax/availability.php',
			type: 'POST',
			cache: false,
			data: {},
			dateType: 'hrml', 
			success: function(date){ 
				if(date == "on")
				{
					window.location.replace("chat.php");
				}
			}
		});
}); 

$('#login-button').click(function() {
		var login = $('#login').val();

		$.ajax({
			url: 'ajax/add_user.php',
			type: 'POST',
			cache: false,
			data: {'login' : login},
			dateType: 'hrml', 
			success: function(date){ 
				console.log(date);
				if(date == "on")
				{
					window.location.replace("chat.php");
				}
			}
		});
});