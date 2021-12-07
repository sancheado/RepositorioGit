<?php
    /*
    ================================
            Conexion PDO SQL 
    ================================
    */
    
    try{
        //variables que necesitamos
        $servidor = "localhost";
        $BDnombre = "colegio";
        $usuario = 'root';
        $contrasena = "";

        //sentencia
        $instruccion = "mysql:host=$servidor; dbname=$BDnombre";
 
        //se crea el objeto de tipo conexión
        $conexion_db=new PDO($instruccion,$usuario,$contrasena);
        $conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion_db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $conexion_db->exec("SET CHARACTER SET utf8");
        return $conexion_db;   
    
    }catch(Exception $e){        
        echo "El error se produce en: " . $e->getline()."<br/>";        
        echo $e->getMessage();
    }    
?>