var chat={}//global object

chat.fetchMessages=function(){
	$.ajax({
		type: "POST",
		url: "ajax/chat.php",
		data: { method: 'fetch'},
	}).success(function (data){
		$('.chat .messages').html(data);
	})
	//create an ajax post call to 'ajax/chat.php'. 
	//- As data send a parameter called method with value 'fetch'. 
	//- Write a success callback in order to fill $('.chat .messages') with returned data.
}

chat.throwMessage=function(message){
	
	if ($.trim(message).length!=0) {
		$.ajax({
			type: "POST",
			url: "ajax/chat.php",
			data: {
				method: 'throw',
				message}
		}).success(function (data){
			
			chat.fetchMessages();
			chat.entry.val('');
		})

		//create an ajax post call to 'ajax/chat.php'. 
		//- As data send a parameter called method with value 'throw' and the corresponding message. 
		//- Write a success callback in order to call fetchMessages from chat object and delete
		// the content of chat.entry selector.
	}
}

chat.entry=$('.chat .entry');//selector to our entry area
chat.entry.bind('keydown', function(e){//keydown eventhandler
	console.log(e.keyCode);
	if (e.keyCode===13 && e.shiftKey===false) {
		chat.throwMessage($(this).val());
		e.preventDefault();//prevents the default action of a new line
	}
})

chat.interval=setInterval(chat.fetchMessages,5000);
chat.fetchMessages();