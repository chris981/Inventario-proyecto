 <html>

 <head>
     <meta>
     <link rel="stylesheet" href="CSS/w3.css">
 </head>

 <body>
     <form action="Funciones/login.php" class="w3-container w3-card-4 w3-light-grey w3-text-orange w3-margin "
         style="width:600px " method="post">

         <center><img src="Recursos/logo.png" width="30%" class="w3-margin-top" /></center>
         <h2 class="w3-center">Sistema de Inventario de Pollolandia</h2>

         <div class="w3-row w3-section">
             <div class="w3-col" style="width:50px"></div>
             <div class="w3-rest">
                 <input class="w3-input w3-border" name="usr" type="text" placeholder="Usuario" required>
             </div>
         </div>

         <div class="w3-row w3-section">
             <div class="w3-col" style="width:50px"></div>
             <div class="w3-rest">
                 <input class="w3-input w3-border" name="psw" type="password" placeholder="Clave" required>
             </div>
         </div>
         <p class="w3-center">
             <input type="submit" class="w3-button w3-round w3-orange w3-section" value="Ingresar">
             <input type="reset" class="w3-button w3-round w3-orange w3-section" value="Cancelar">
         </p>
     </form>

 </body>

 </html>