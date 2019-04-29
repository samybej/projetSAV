
function verif_cmnt(){
	//var vote = $("input[name='vote']:checked").val();
	$.post('verifier_cmnt.php', {num_p: num_p} ,function(result){
		if (result == false){
			$("#delete").css("display", "block");
		}
	});
}
verif_cmnt();
function liste_commentaires(){
	$.post('liste_commentaires.php', { num_p: num_p} ,function(data) {
		$('.comment .messages').html(data);
	});
}
setInterval(liste_commentaires,2000);
setInterval(verif_cmnt,2000);
liste_commentaires();

function avis(){
	$.post('affichVote.php', { num_p: num_p} ,function(data) {
		//alert(data);
		if (data == '5'){
			$("#star5").prop("checked", true);
		}
		else if (data == '4'){
			$("#star4").prop("checked", true);
		}
		else if (data == '3'){
			$("#star3").prop("checked", true);
		}
		else if (data == '2'){
			$("#star2").prop("checked", true);
		}
		else if (data == '1'){
			$("#star1").prop("checked", true);
		}
		//$("input[name='vote']:checked").val(data);

});
}
avis();

function envoi_vote(){
	$('.rate').click(function(){
	var vote = $("input[name='vote']:checked").val();
	
		$.post('envoi_avis.php', { num_p: num_p , vote: vote} ,function(data) {
			//alert(data);
		//$('.rate ').html(data);
});
	});

	}
	envoi_vote();

function envoi_avis(){
	$('.comment .entree').keyup(function(e){
		var messages = $('.comment .entree').val();
		//var voteValue = $("input[name='vote']:checked").val();
		messages = $.trim(messages);
		//alert(messages);
			if (messages !== '' && e.keyCode === 13 && e.shiftKey === false){
				$.post('envoi_cmnt.php', {messages: messages , num_p: num_p} ,function(result){
					liste_commentaires();
					$('.comment .messages').html(result);
					$('.comment .entree').val('');
					$('.comment .entree').attr('placeholder', 'Type to edit your comment');
				});
				
			}
	});
}
envoi_avis();
function delete_cmnt(){
	//var vote = $("input[name='vote']:checked").val();
	$.post('verifier_cmnt.php', {num_p: num_p} ,function(result){
		if (result == false){
			$('#delete').click(function(){
				$.post('delete_cmnt.php', function(result){
					$("#delete").css("display", "none");
				});
		});
	}
});
}

delete_cmnt();
setInterval(delete_cmnt,2000);

function avis_moyenne(){
	//alert(num_p);
	$.post('avis_moyenne.php', {num_p: num_p} , function(result){
		//$('.comment .entree').attr('placeholder', 'not working');
			$('#moyenne_avis').html(result);

	});
}
setInterval(avis_moyenne,2000);
avis_moyenne();


/*
function get_prod(){
	console.log("aaaa");
	console.log(num_p);
}

get_prod();*/