<html>

  <head>
      <title>Iniciar Sesion</title>
      <link rel="stylesheet" href="css/estilosFormularios.css">


  </head>

  <body>

  	<div class="box1">

  		<img src="assets/logoRetocado.jpg" class="logotipo">

  		 <form class="datosDeRegistro" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" METHOD="POST">

	  		 <label class="indicadorInput"> Maximo <?php  echo 50; ?> Caracteres
          		<input type="text" placeholder="Name" name="name" value="<?php if(isset($_POST['name'])) echo ($_POST['name']); ?>" 50="<?php  echo 50; ?>" required>
              <!-- el atributo value se utiliza para que haya un valor por defecto, en este caso se utiliza para mantener un valor
              en el formulario mientras se valida dicho valor -->
        	 </label>

        	 <label class="indicadorInput"> Maximo <?php  echo 50; ?> Caracteres
          		<input type="password" placeholder="Password" name="password" maxlength=50"<?php  echo 25; ?>" required>
        	 </label>

	         <button type="submit" id="loginbtn">Iniciar Sesion</button>

	     </form>

  	</div>

    <div id="box2"> ¿No tienes cuenta?

    	<button type="button" onclick="location = 'SingIn'">Registrate</button>

    </div>

    <?php

      if($_POST){

          /*Se encarga se hacer TODAS las validaciones de este apartado*/
          include 'objetos/CapturaIniciar.php';
          $capture = new CapturaIniciar();

          $datos = $capture->CapturaValidarFormulario();

          //Lo Guardamos en una Variable JSON
          $JSON = json_encode($datos);

          $url = 'https://quiet-basin-87095.herokuapp.com/usuarios';

          //  Initiate curl
          $ch = curl_init();
          // Disable SSL verification
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          // Will return the response, if false it print the response
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          // Set the url
          curl_setopt($ch, CURLOPT_URL,$url);
          // Execute
          $result = curl_exec($ch);
          // Closing
          curl_close($ch);

          // Will dump a beauty json :3
          var_dump(json_decode($result, true));
          echo "<pre>$result</pre>";


          //$Json2 = json_decode($result, true);
          //echo $Json2;
          //$arreglo = array(json_decode($result, true));
          //echo $arreglo[0];

          if($datos != "Error"){
            //echo "<script language='javascript'>window.location='salidas/action_iniciar_sesion.php'</script>";
          }

      }

    ?>

  </body>

</html>
