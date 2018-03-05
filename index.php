<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Чемпионат мира по футболу</title>

    <!-- Bootstrap -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container">
<?php

spl_autoload_register(function($class)
{
	require($class . ".php");
});

$commands = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	?>
	<p class="text-center">
    <form class="form-inline" method="post">
			<div class="form-group">
				<input type="submit" class="btn btn-primary" placeholder="Начать расчет" name="submit" value="Начать расчет">
			</div>
	</form>
	</p>
<?php	
}
else
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'Начать расчет')
{
	
	$commands = Facades::get_commands();
	Facades::show_commands($commands);
	Facades::run($commands);
	
}

?>	
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/js/bootstrap.min.js"></script>
    </body>
</html>

