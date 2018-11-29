<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="dist/logo.svg">

    <title>PHP GSM</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dist/style.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form id="sendForm" class="form-signin">
      <img class="mb-4" src="dist/logo.svg" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">PHP GSM</h1>
      <input type="text" id="com-port" class="form-control" placeholder="COM PORT" required>
      <br>
      <input type="text" id="cell-number" class="form-control" placeholder="Phone Number" required>
      <br>
      <textarea id="text-message" class="form-control" placeholder="Message"></textarea>
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018 박깅잭</p>
    </form>

	<script type="text/javascript" src="dist/jquery.js"></script>

	<script type="text/javascript">

		$(document).on('submit', '#sendForm', function(event) {

		event.preventDefault();
		
		var com_port = $('#com-port').val();
		var cell_number = $('#cell-number').val();
		var text_message = $('#text-message').val();

		$.ajax({
			url: "/send.php",
			type: 'POST',
			dataType: 'json',
			data:
			{
				'port' : com_port,
				'number' : cell_number,
				'message' : text_message
			},

			success:function(Result)
			{
				if(Result.response == 200){
					console.log(Result);
					$('#sendForm')[0].reset();
					alert("Successfully Send");
				}else{
					alert("Sending Failed: "+Result.message);
				}
				

				
			}
		});

	});
	</script>



  </body>
</html>
