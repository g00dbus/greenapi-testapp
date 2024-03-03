<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GreenAPI Test App: Support lvl 2</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
	<div class="container-sm">
  		<div class="row">
  			<h1 class="text-green text-center p-5"><img src="img/logo.png" class="logo">GreenAPI Test App: Support lvl 2</h1>

  			<div class="col-lg-6"><!--Left Block-->
  				<div class="mb-3">
	  				<label for="idInstanceInput">Введите полученный id Instance</label>
	  				<input type="text" id="idInstanceInput" placeholder="ID Instance" class="form-control">
	  			</div><!--mb-3-->

	  			<div class="mb-3">
	  				<label for="apiTokenInput">Введите свой API-key</label>
	  				<input type="text" id="apiTokenInput" placeholder="API Token" class="form-control">
	  			</div><!--mb-3-->

	  			<div class="d-grid gap-2 p-3"><!--Buttons Block-->
		  			<button type="submit" class="btn btn-primary btn-success" id="getSettings">getSettings</button>
		  			<button type="submit" class="btn btn-primary btn-success" id="getStateInstance">getStaceInstance</button>
		  		</div><!--End of Buttons Block-->

  			<div class="mb-3">
	  			<input type="text" id="userNumSendMessageInput" placeholder="+7 777 123 45 67" class="form-control m10">
	  			<textarea class="form-control m10" id="helloWorldArea" rows="3" placeholder="Hello World!"></textarea>

	  			<div class="d-grid gap-2 p-3"><!--Buttons Block-->
		  			<button type="submit" class="btn btn-primary btn-success" id="sendMessage">sendMessage</button>
		  		</div><!--End of Buttons Block-->
	  		</div><!--mb-3-->

	  		<div class="mb-3">
	  			<input type="text" id="userNumSendFileInput" placeholder="+7 777 123 45 67" class="form-control m10">
	  			<input type="text" id="pictureUrlInput" placeholder="https://my.site.com/img/horse.png" class="form-control m10">

	  			<div class="d-grid gap-2 p-3"><!--Buttons Block-->
		  			<button type="submit" class="btn btn-primary btn-success" id="sendFileByUrl">sendFileByUrl</button>
		  		</div><!--End of Buttons Block-->
	  		</div><!--mb-3-->
	  	</div><!--End Of Left Block-->

  		<div class="col-lg-6"><!--Right Block-->
  			<div class="mb-3">
				<label for="exampleFormControlTextarea1" class="form-label">Ответ сервера:</label>
				<textarea class="form-control" id="serverAnswer" rows="25" placeholder="" readonly></textarea>
			</div>
  		</div><!--End OF Right Block-->
  	</div>
</body>
</html>