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
   //Creamos la clase coche
   class Coche{
       public $_color = "Rojo";
       public $_marca = "Ferrari";
       public $_modelo = "Aventador";
       public $_velocidad = 300;
       public $_caballaje = 500;
       public $_plazas = 2;


    //Getters
    public function __getColor($color){
        return $this->_color = $color;
    }

    public function __getMarca($marca){
        return $this->_marca = $marca;
    }

    public function __getModelo($modelo){
        return $this->_modelo = $modelo;
    }

    public function __getVelocidad($velocidad){
        return $this->_velocidad = $velocidad;
    }

    public function __getCaballaje($caballaje){
        return $this->_caballaje = $caballaje;
    }

    public function __getPlazas($plazas){
        return $this->_plazas = $plazas;
    }

    //Setters
    public function __setColor($color){
        $this->_color = $color;
    }
    public function __setMarca($marca){
        $this->_marca = $marca;
    }
    public function __setModelo($modelo){
        $this->_modelo = $modelo;
    }
    public function __setVelocidad($velocidad){
        $this->_velocidad = $velocidad;
    }
    public function __setCaballaje($caballaje){
        $this->_caballaje = $caballaje;
    }
    public function __setPlazas($plazas){
        $this->_plazas = $plazas;
    }    

    //Construct()
    function __construct($color,$marca,$modelo,$velocidad,$caballaje,$plazas){
        //mediante los bucles if else, verificamos si entramos con dato o sin el.        
        if($color == '' || $color == "") $this->_color = "Rojo";
        else  $this->_color = $color;
        
        if($marca == '' || $marca == "") $this->_marca = "Ferrari";
        else $this->_marca = $marca;

        if($modelo == '' || $modelo == "") $this->_modelo = "Aventador";
        else $this->_modelo = $modelo;

        if($velocidad == '' || $velocidad == "") $this->_velocidad = 300;
        else $this->_velocidad = $velocidad;

        if($caballaje == '' || $caballaje == "") $this->_caballaje = 500;
        else $this->_caballaje = $caballaje;

        if($plazas == '' || $plazas == "") $this->_plazas = 2;
        else $this->_plazas = $plazas;
    }

    function __toString(){
        return "<div><h3>Nuevo Coche</h3>
        <p>Marca= <b>$this->_marca</b></p>
        <p>Modelo: <b>$this->_modelo</b></p>
        <p>Velocidad Máx: <b>$this->_velocidad</b></p>
        <p>Caballos: <b>$this->_caballaje</b></p>
        <p>Numero de asientos: <b>$this->_plazas</b></p></div>";
    }

    function acelerar(){
        $this->_velocidad = $this->_velocidad + 1;
    }

    function frenar(){
        $this->_velocidad = $this->_velocidad - 1;
    }


    function mostrarInformacion($mostrar){
        return "<p>$mostrar</p>";
    }

   }
   $coche = new Coche("Amarillo","Renault","Clio", 150, 200, 5);
   $coche1 = new Coche("Verde","Seat","Panda", 250, 200, 5);
   $coche2 = new Coche("Azul","Citroen","Xara", 100, 220, 4);
   $coche3 = new Coche("Rojo","Mercedes","Clase A", 350, 100, 3);
   $coche->color = "Rosa";
   $coche->__setMarca("Audi");
   echo $coche;
   echo $coche->mostrarInformacion("HOLA MUNDO DESDE UN METODO");
   echo $coche1;
   echo $coche2;
   echo $coche3;

?>
 </body>
    <script type="text/javascript">
    </script>
</html>