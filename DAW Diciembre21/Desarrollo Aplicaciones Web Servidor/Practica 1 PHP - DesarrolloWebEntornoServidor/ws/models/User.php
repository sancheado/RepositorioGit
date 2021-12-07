<?php    
    require_once("./interfaces/IToJson.php");  

    class User implements IToJson{
        public $_nombre;
        public $_Apellidos;
        public $_Email;
        public $_Pass;
        public $_Number;
        public $_Sex;

        //Getters
        public function __getNombre($nombre){
            return $this->_nombre = $nombre;
        }
        public function __getApellidos($ape){ 
            return $this->_Apellidos = $ape;
        }
        public function __getEmail($email){
            return $this->_Email = $email;
        }
        public function __getPass($pass){
            return $this->_Pass = $pass;
        }
        public function __getNumber($number){
            return $this->_Number = $number;
        }
        public function __getSex($sex){
            return $this->_Sex = $sex;
        }

        //Setters
        public function __setNombre($nombre){
            $this->_Nombre = $nombre;
        }
        public function __setApellidos($ape){
            $this->_Apellidos = $ape;
        }
        public function __setEmail($email){
            $this->_Email = $email;
        }
        public function __setPass($pass){
            $this->_Pass = $pass;
        }
        public function __setNumber($number){
            $this->_Numero = $number;
        }
        public function __setSex($sex){
            $this->Sex = $sex;
        }

        //Construct()
        function __construct($nombre,$ape,$email,$pass,$number,$sex){
            $this->_Nombre = $nombre;
            $this->_Apellido = $ape;
            $this->_Email = $email;
            $this->_Pass = $pass;
            $this->_Numero = $number;
            $this->_Sex = $sex;
            
            //toJson();
        }

        //Mostrar datos
        function __toString(){
            return "<div class='row'><h3>Nuevo Usuario completado</h3>
            <h4>Los datos son los siguientes: </h4>
            <p>Nombre: </p><p style='text-align:center;'><b style='color:#46bb6c;'>$this->_Nombre</b></p>
            <p>Apellidos:</p><p style='text-align:center;'> <b style='color:#46bb6c;'>$this->_Apellido</b></p>
            <p>Email:</p><p style='text-align:center;'> <b style='color:#46bb6c;'>$this->_Email</b></p>
            <p>Password:</p><p style='text-align:center;'> <b style='color:#46bb6c;'>$this->_Pass</b></p>
            <p>Numero:</p><p style='text-align:center;'> <b style='color:#46bb6c;'>$this->_Numero</b></p>
            <p>Sexo:</p><p style='text-align:center;'> <b style='color:#46bb6c;'>$this->_Sex</b></p></div>";
        }

        //Implementamos la interfaz
        function toJson($datos){

            //Bucle for de toda la vida
            $ultimo = count($datos);

            for($i = 0;$i <= $ultimo - 1; $i++){
                $contador = $i + 1;
                if($contador == $ultimo) echo "<br/>";
                else echo "<div class='row' style='border:.5px solid #46bb7C;'><h2 style='text-align:center;'>$contador</h2></div><div class='row' style='border:.5px solid #46bb7C;'><div class='col-md-2'><td><p>Nombre:  </p><p><b>".$datos[$i]->Nombre."</b></div>
                <div class='col-md-2'><p>Apellidos:  </p><p><b>".$datos[$i]->apellidos."</b></div>
                <div class='col-md-2'><p>Email:  </p><p><b style='font-size:12px;'>".$datos[$i]->email."</b></div>
                <div class='col-md-2'><p>Contraseña:  </p><p><b style='font-size:13px;'>".$datos[$i]->pass."</b></div>     
                <div class='col-md-2'><p>Num Telefono: </p><p><b>".$datos[$i]->number."</b></div>  
                <div class='col-md-2'><p>Sexo: </p><p><b>".$datos[$i]->sex."</b></div></div> ";
            }
            /*
            Mediante un foreach
            $ultimo = count($datos);
            $i = 0;
            foreach($datos as $regis){
                $i += 1;
                if($i < $ultimo) echo "<div class='row' style='border:.5px solid #46bb7C;'><h2 style='text-align:center;'>$i</h2></div><div class='row' style='border:.5px solid #46bb7C;'><div class='col-md-2'><td><p>Nombre:  </p><p><b>".$regis->Nombre."</b></div>
                    <div class='col-md-2'><p>Apellidos:  </p><p><b>".$regis->apellidos."</b></div>
                    <div class='col-md-2'><p>Email:  </p><p><b style='font-size:12px;'>".$regis->email."</b></div>
                    <div class='col-md-2'><p>Contraseña:  </p><p><b style='font-size:13px;'>".$regis->pass."</b></div>     
                    <div class='col-md-2'><p>Num Telefono: </p><p><b>".$regis->number."</b></div>  
                    <div class='col-md-2'><p>Sexo: </p><p><b>".$regis->sex."</b></div></div> ";
                if($i == $ultimo) echo "<br/>";                   
            }
            */
        }
    }
    ?>