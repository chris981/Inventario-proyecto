<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="../CSS/w3.css" rel="stylesheet">
</head>
<body>

<div class="w3-bar w3-orange">
	<b><a class="w3-bar-item w3-button" href="#">Inicio</a></b>
	<a class="w3-bar-item w3-button w3-hide-small" href="#">Control Mensual </a>
	<a class="w3_bar-item w3-button w3-hide-small" href="#">Controles</a>
	<a class="w3_bar-item w3-button w3-hide-small" href="#">Control RBD Frituras</a>
	<a class="w3_bar-item w3-button w3-hide-small" href="#">Recepcion de Frituras</a>
	<a class="w3_bar-item w3-button w3-hide-small" href="#">Control Mensual y Pollo Refrigerado</a>
	<a class="w3_bar-item w3-button w3-hide-small" href="#">Controles Mensual Refrescos</a>
	<a class="w3_bar-item w3-button w3-hide-small" href="#">Salir</a>
	<a class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" href="javascript:void(0)" onclick="myFunction()">&#9776;</a>
</div>
<div id="demo" class="w3-bar-block w3-red w3-hide w3-hide-large w3-hide-medium">
	<a class="w3-bar-item w3-button" href="#">Control Mensual </a>
	<a class="w3-bar-item w3-button" href="#">Controles</a>
	<a class="w3-bar-item w3-button" href="#">Control RBD Frituras</a>
	<a class="w3-bar-item w3-button" href="#">Recepcion de Frituras</a>
	<a class="w3-bar-item w3-button" href="#">Control Mensual y Pollor Refrigerado</a>
	<a class="w3-bar-item w3-button" href="#">Control Mensual Refrescos</a>
	<a class="w3-bar-item w3-button" href="#"> Salir</a>
</div>
<script>
function myFunction() {
  var x = document.getElementById("demo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>

</html>
