function reception_msg(){
		var id_client =  document.getElementById("client").innerHTML;
		//alert(id_client);
	$.post('reception_msg.php',{id_client: id_client},function(data) {
		$('.chat .messages').html(data);
	
	});
}
setInterval(reception_msg,2000);
reception_msg();

function envoi_msg(){

	$('.chat .entree').keyup(function(e){
		var messages = $('.chat .entree').val();
		messages = $.trim(messages);
		var id_client= document.getElementById("client").innerHTML;
		//alert(messages);
			if (messages !== '' && e.keyCode === 13 && e.shiftKey === false){
				$.post('envoi_msg.php', {messages: messages, id_client: id_client} ,function(result){
					reception_msg();
					$('.chat .messages').html(result);
					$('.chat .entree').val('');
				});
				
			}
	});
}
envoi_msg();