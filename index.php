<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Distribuidora</title>

		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="mvc/lib/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="mvc/lib/bootstrap/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="mvc/lib/css/style.css">
		
		<script src="mvc/lib/jquery/jquery-1.12.0.min.js"></script>
		<script src="mvc/lib/bootstrap/js/bootstrap.min.js"></script>

		
		
	</head>
 	<body onload="StartPage()"></body>
	<script>
		function StartPage() {
			$(document).ready(function() {
				$.getScript("mvc/lib/js/ajaxmvc.js", function() {
					show("home","index","body","");
				});
			});
		}
	</script>
</html>
