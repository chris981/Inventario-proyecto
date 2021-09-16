<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location: ../index.php");
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="../CSS/w3.css" rel="stylesheet">
    </head>

    <body>
        <?php
        // Copiar siempre
        include "./menu.php";
        ?>
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
<?php }
?>