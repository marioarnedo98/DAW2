<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">		
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<title>Programando Brother's</title>
	</head>
	<body>
		<div  class="container-fluid">
			<section  style="padding: 15%;">			
				<div class="row">				
					<h1 class="text-center">Chat: <small>Programando Brother's</small></h1>	
					<hr>
				</div>	
				<div class="row">
					<form id="formChat" role="form">
						<div class="form-group">
							<label for="user">User</label>
							<input type="text" class="form-control" id="user" name="user" placeholder="Enter User">
						</div>
						<div class="form-group">							
							<div class="row">
								<div class="col-md-12" >
									<div id="conversation" style="height:200px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">
										
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">				
							<label for="message">Message</label>
							<textarea id="message" name="message" placeholder="Enter Message"  class="form-control" rows="3"></textarea>
						</div>
						<button id="send" class="btn btn-primary" >Send</button>						
					</form>
				</div>
			</section>	
		</div>	
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>		
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script>
		
			$(document).on("ready", function(){				
				registerMessages();
				$.ajaxSetup({"cache":false});
				setInterval("loadmensajes()",500);
			});
			var registerMessages = function(){
				$("#send").on("click", function(e){
					e.preventDefault();
					var frm = $("#formChat").serialize();
					$.ajax({
						type:"POST",
						url:"register.php",
						data:frm
					}).done(function(info){
						console.log(info);
					})
				})
			}
			var loadmensajes= function() {
				$.ajax({
					type:"POST",
					url:"conversation.php"
				}).done(function (info){
					$("#conversation").html(info);
					$("#conversation p:last-child").css({
						"background-color":"lightgreen",
						"padding-bottom": "20px" 
					});
				})
			}


			
		</script>
	</body>
</html>