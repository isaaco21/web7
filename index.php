<?php

if (!isset($_GET['calle'])) {
  header("location:elegir.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>semaforo</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .luz{
        height:200px;
        margin-bottom:10px;
        border-radius:50px;
      }
    </style>
  </head>
  <body>
    <h3 class="text-center">semaforo</h3>
    <div class="row">
      <div id="rojo" class="col col-sm-offset-3 col col-sm-6 label-danger luz">

      </div>
    </div>
    <div class="row">
      <div id="amarillo" class="col col-sm-offset-3 col col-sm-6 label-warning luz">

      </div>
    </div>
    <div class="row">
      <div id="verde" class="col col-sm-offset-3 col col-sm-6 label-success luz">

      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
      var color="rojo";
      var tiempo=0;

      $(".luz").hide();
      $("#"+color).show();
      function ciclo(){
        if(color == "rojo" && tiempo > 10){
          color = "verde";
          tiempo = 0;
        }
        else if(color == "amarillo" && tiempo > 2) {
          color = "rojo";
          tiempo = 0
        }
        else if (color == "verde" && tiempo > 8) {
          color = "amarillo"
          tiempo = 0
        }
        $(".luz").hide();
        $("#"+color).show();
        actualizarServidor(color);
        tiempo++;
      }
      function actualizarServidor(ccc){
        $.ajax({
          url:'server.php',
          method:'post',
          data:{'color':color},
          success:function(info){
            console.log(info);
          }
        });
      }

      setInterval(ciclo, 1000);
    </script>
  </body>
</html>
