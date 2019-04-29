function reception_msg(){
	$.post('reception_msg.php',function(data) {
		$('.chat .messages').html(data);
	});
}
setInterval(reception_msg,2000);
reception_msg();

function envoi_msg(){
	$('.chat .entree').keyup(function(e){
		var messages = $('.chat .entree').val();
		messages = $.trim(messages);
		//alert(messages);
			if (messages !== '' && e.keyCode === 13 && e.shiftKey === false){
				$.post('envoi_msg.php', {messages: messages} ,function(result){
					reception_msg();
					$('.chat .messages').html(result);
					$('.chat .entree').val('');
				});
				
			}
	});
}
envoi_msg();