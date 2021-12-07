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
   //Creamos la clase Persona
   class Persona{
       public $_nombre;
       public $_apellido;
       public $_altura;
       public $_edad;

    //Getters
    public function __getNombre($nombre){
        return $this->_nombre = $nombre;
    }

    public function __getApellido($apellido){
        return $this->_apellido = $apellido;
    }
    
    public function __getAltura($altura){
        return $this->_altura = $altura;
    }
    
    public function __getEdad($edad){
        return $this->_edad = $edad;
    }

    //Setters
    public function __setNombre($nombre){
        $this->_nombre = $nombre;
    }

    public function __setApellido($apellido){
        $this->_apellido = $apellido;
    }

    public function __setAltura($altura){
        $this->_altura = $altura;
    }

    public function __setEdad($edad){
        $this->_edad = $edad;
    }
    
    function __construct($nombre,$apellido,$altura,$edad){
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_altura = $altura;
        $this->_edad = $edad;

    }

    public function hablar(){
        echo "<p>Hola $this->_nombre , $this->_apellido</p>
        <p>Usted tiene $this->_altura cm de altura con <b>$this->_edad</b> años.</p>";
    }

    public function caminar(){

    }

   }

   class informatico extends Persona{
       public $_lenguajes;
       public $_experienciaProgramador;
       
       //Getters
       function __getLenguaje($lenguaje){
           return $this->_lenguaje = $lenguaje;
       }
       function __getExperiencia($experiencia){
            return $this->_experienciaProgramador = $experiencia;
       }

       //Setters
       function __setLenguaje($lenguaje){
            $this->_lenguaje = $lenguaje;
       }

       function __setExperiencia($experiencia){
            $this->_experienciaProgramador = $experiencia;
       }

       function __construct($nombre,$apellido,$altura,$edad,$lengu,$expe){
            parent::__construct($nombre,$apellido,$altura,$edad);
            $this->_lenguaje = $lengu;
            $this->_experienciaProgramador = $expe;
       }

       public function programar(){

       }

       public function repararordenador(){

       }

       public function hacerofimatica(){
            echo "<p>El lenguaje es: $this->_lenguaje</p>
            <p>Y la experiencia es: $this->_experienciaProgramador</p>";
       }
   }

   class tecnicoredes extends informatico{
        public $_auditarredesexpienciaredes;

        //get
        function __getAuditar($auditar){
            return $this->_auditarredesexpienciaredes = $auditar;
        }
        //Set
        function __setEAuditar($auditar){
           $this->_auditarredesexpienciaredes = $auditar;
        }

        function __construct($nombre,$apellido,$altura,$edad,$lengu,$expe,$auditar){
            parent::__construct($nombre,$apellido,$altura,$edad,$lengu,$expe);
            $this->_auditarredesexpienciaredes = $auditar;
        }


        public function auditarredes(){

        }
   }

   $test = new tecnicoredes("Jose","Sánchez",187,34,"XML","avanzado","aaaa");
   $test->hablar();
   $test->hacerofimatica();
?>
 </body>
    <script type="text/javascript">
    </script>
</html>