<?php
    //Creamos la clase llamada Cuenta
class Alumno{
    private $_nombre;
    private $_apellidos;
    private $_email;
    private $_password;
    private $_telefono;
    private $_sexo;
    private $_fecha;

    //Getters
    public function __getNombre($nombre){
        return $this->nombre = $nombre;
    }

    public function __getApellidos($apellidos){
        return $this->apellidos = $apellidos;
    }

    public function __getEmail($email){
        return $this->email = $email;
    }

    public function __getPassword($pass){
        return $this->password = $pass;
    }

    public function __getNumero($number){
        return $this->numero = $number;
    }

    public function __getSexo($sexo){
        return $this->sexo = $sexo;
    }

    public function __getFecha($fecha){
        return $this->fecha = $fecha;
    }

    //Setters
    public function __setNombre($nombre){
        $this->_nombre = $nombre;
    }
    public function __setApellidos($apellidos){
        $this->_apellidos = $apellidos;
    }
    public function __setEmail($email){
        $this->_email = $email;
    }
    public function __setPassword($pass){
        $this->_password = $pass;
    }
    public function __setNumero($number){
        $this->_numero = $number;
    }
    public function __setFecha($date){
        $this->_fecha = $date;
    }    

    //Construct()
    function __construct($nombre,$apellidos,$email,$pass,$numero,$sexo,$fecha){
        $this->_nombre = $nombre;
        $this->_apellidos = $apellidos;
        $this->_email = $email;
        $this->_password = $pass;
        $this->_numero = $numero;
        $this->_sexo = $sexo;
        $this->_fecha = $fecha;
    }

    function __toString()
    {
        //metodo que va a mostrar por pantalla
        return "<p>Para $this->_nombre , $this->_apellidos.</p><p>Siendo un ($this->_sexo), con EMAIL [ $this->_email ] y password: $this->_password </p><p>Con número de telefono: $this->_numero y una fecha de nacimiento($this->_fecha)</p>";
    }


    //Funcion a la cual llamamos para crear y rellenar un archivo Json
    function creaJson($comprobacion,$message,$nombre,$apellidos,$email,$pass,$telefono,$sexo,$fecha){

        //Creamos el Array de datos para el Json que creamos
        $arr_Alumnos = array(
            "Succes",$comprobacion,
            "Message",$message,
            array("Nombre",$nombre),
            array("Apellido",$apellidos),
            array("Email",$email),
            array("Contrasena",$pass),
            array("Telefono",$telefono),
            array("Sexo",$sexo),
            array("Fecha Nacimiento",$fecha)
        );

        //creamos el array para json externo
        $arr_AlumnosExt = '';

        //variable con el nombre del archivo
        $file = 'respuesta.json';

        //comprobamos si el archivo Json existe o no.
        if (file_exists($file)){

            //Leemos el JSON existente
            $datos = file_get_contents($file);

            $json_string = json_encode($arr_Alumnos);    

            //unimos los datos anteriores del fichero json y añadimos los nuevos.
            $data = $datos.$json_string;
            file_put_contents($file, $data);
        }
        else{
            $json_string = json_encode($arr_Alumnos);            
            file_put_contents($file, $json_string);
        }

        
    }
}


?>