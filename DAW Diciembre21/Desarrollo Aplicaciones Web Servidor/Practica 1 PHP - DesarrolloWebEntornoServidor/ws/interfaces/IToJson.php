<?php

    //Declaramos la interfaz 'IToJson'
    interface IToJson{
        public function __getNombre($nombre);
        public function __getApellidos($ape);
        public function __getEmail($email);
        public function __getPass($pass);
        public function __getNumber($number);
        public function __getSex($sex);

        public function __setNombre($nombre);
        public function __setApellidos($ape);
        public function __setEmail($email);
        public function __setPass($pass);
        public function __setNumber($number);
        public function __setSex($sex);

        function __construct($nombre,$ape,$email,$pass,$number,$sex);

        function __toString();
        
        public function toJson($datos);
    }

?>