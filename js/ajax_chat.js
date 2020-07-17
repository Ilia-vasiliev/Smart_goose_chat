$(document).ready(function() {
		function_Order();
	}); 

	var timer = null;
	function function_Order(){
	    if (timer) {
	        clearTimeout(timer);
	    }
	      
	    timer = setTimeout(function(){
	        timer = null; 
	        message_view();
	        function_Order();
	    }, 2000);  
	}

	$('#send').click(function() {
		var massage = $('#input').val();

		$.ajax({
			url: 'ajax/message_add.php',
			type: 'POST',
			cache: false,
			data: {'massage' : massage},
			dateType: 'hrml', 
			success: function(date){ 
				message_view();
				$('#input').val('');
			}
		});
				
	});

	function message_view(){
		$.ajax({
			url: 'ajax/message_view.php',
			type: 'POST',
			cache: false,
			data: {},
			dateType: 'hrml', 
			success: function(date){ 
				$('#content').html(date);
			}
		});
    }
    var rebut_status = 0;
    var id_entry_edit;

    function rebut(selector){
		let readers = document.querySelectorAll(selector);
		for (let i=0; i<readers.length; i++) {
			readers[i].onclick = function_click;
		}
    }

    function function_click(event) {
		var id_entry = $(this).attr("data-identry");
		console.log(id_entry)
		if(rebut_status == 0)
		{
			ajax_del(id_entry);
		}
		else
		{
			ajax_massage_text(id_entry);
		}
	}

	function ajax_del(id_entry){
		$.ajax({
			url: 'ajax/message_del.php',
			type: 'POST',
			cache: false,
			data: {'id_entry' : id_entry},
			dateType: 'hrml', 
			success: function(date){ 
				message_view();
			}
		});
	}

	function ajax_massage_text(id_entry){
		$.ajax({
			url: 'ajax/Massage_Text.php',
			type: 'POST',
			cache: false,
			data: {'id_entry' : id_entry},
			dateType: 'hrml', 
			success: function(date){ 
				$('#input').val(date);
				id_entry_edit = id_entry;
				$('#send_edit').show();
				$('#back').show();
				$('#edit').hide();
			}
		});
	}

    $(document).on('click', '#delete', function() {
      rebut('#delete');
 	});

 	$(document).on('click', '#edit', function() {
      rebut('#edit');
      rebut_status = 1;
 	});

 	$('#send_edit').click(function() {
		var massage = $('#input').val();

		$.ajax({
			url: 'ajax/message_edit.php',
			type: 'POST',
			cache: false,
			data: { 'massage' : massage, 
					'id_entry' : id_entry_edit},
			dateType: 'hrml', 
			success: function(date){ 
				message_view();
				$('#input').val('');
				$('#send_edit').hide();
				$('#edit').show();
				$('#back').hide();
			}
		});
	});

    $(document).on('click', '#back', function() {
      $('#send_edit').hide();
		$('#edit').show();
		$('#back').hide();
 	});

 	$('.close').click(function() {
		$.ajax({
			url: 'ajax/Log_off.php',
			type: 'POST',
			cache: false,
			data: {},
			dateType: 'hrml', 
			success: function(date){ 
				console.log(date);
				window.location.replace("index.php");
			}
		});
	});