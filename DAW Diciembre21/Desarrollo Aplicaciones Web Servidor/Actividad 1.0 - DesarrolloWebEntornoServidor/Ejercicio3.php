<!DOCTYPE html>
<html>
    <meta charset="ISO-8859-1">
	<head>
        <title>Vector3.php - Programa Completo Calculadora</title>
        <!-- Fuente de Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montaga&family=Montserrat:ital,wght@0,100;1,800&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;1,800&display=swap" rel="stylesheet">

        <!-- Boostrap libreria -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style  type="text/css">
        body{background-color: #46bb6c;}
        h3{
            font-weight: 800;
            line-height: 32px;
            color:#fff;
            text-align: center;
            margin: 25px auto;
            font-size: 35px;
        }
        p{
            font-weight: 800;
            line-height: 32px;
            color:#fff;
            text-align: center;
            margin: 25px auto
        }
        </style>
    </head>
    <body>
<?php
    //creamos la clase configuración
    class Configuracion{
        public $color;
        public $newsletter;
        public $entorno;

        //getters
        function __getColor($color){
            return $this->color = $color;
        }

        function __getNewsletter($newsletter){
            return $this->newsletter = $newsletter;
        }

        function __getEntorno($entorno){
            return $this->entorno = $entorno;
        }

        //setters
        function __setColor($color){
            $this->color = $color;
        }

        function __setNewsletter($newsletter){
            $this->newsletter = $newsletter;
        }

        function __setEntorno($entorno){
            $this->entorno = $entorno;
        }

        function __construct($color,$newsletter,$entorno){
            $this->color = $color;
            $this->newsletter = $newsletter;
            $this->entorno = $entorno;
        }

        function mostrarMensaje(){
            echo "<p>Tenemos un color, <b>$this->color</b></p>
            <p>Una newsletter de: $this->newsletter</p>
            <p>Y un entorno <b>$this->entorno</b></p>";
        }
    }
    $miConfi = new Configuracion("Azul",2021,"Real");
    $miConfi->mostrarMensaje();
?>
 </body>
    <script type="text/javascript">
    </script>
</html>