<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar Usuario</title>
        <!--Libreria bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
         
        <!--Aquí va nuestro estilo para la web-->
        <link rel="stylesheet" type="text/css" href="../css/myStile.css">

    </head>
    <body>
        <div class="container miSection">
            <?php
                //Requerimos la clase Alumno y la conexión con la BD.
                require("conexion.php");
                require("Usuario.php");


                if(ISSET($_GET["txtNombre"]) || ISSET($_GET["txtApellidos"]) || ISSET($_GET["txtEmail"]) || ISSET($_GET["txtPass"])){

                    //Variables que captamos del formulario.
                    $id = $_GET["miOculto"];
                    $nombre = $_GET["txtNombre"];
                    $apellidos = $_GET["txtApellidos"];
                    $email = $_GET["txtEmail"];
                    $pass = $_GET["txtPass"];
                    $telefono = $_GET["txtNumero"];
                    $sexo = $_GET["txtSexo"];
                    $fecha = $_GET["txtFecha"];


                    $consulta = "UPDATE alumno
                    SET `nombre`= :nombre, `apellidos` = :apellidos, `password` = :password, `telefono` = :telefono, `email` = :email, 
                    `sexo` = :sexo, `fecha_nacimiento` = :fecha_nacimiento WHERE `id` = :id";
                    
                    $sql = $conexion_db->prepare($consulta);

                    $sql->bindParam(':nombre',$nombre,PDO::PARAM_STR, 25);
                    $sql->bindParam(':apellidos',$apellidos,PDO::PARAM_STR, 25);
                    $sql->bindParam(':password',$pass,PDO::PARAM_STR,25);
                    $sql->bindParam(':telefono',$telefono,PDO::PARAM_STR,25);
                    $sql->bindParam(':email',$email,PDO::PARAM_STR);
                    $sql->bindParam(':sexo',$sexo,PDO::PARAM_INT);
                    $sql->bindParam(':fecha_nacimiento',$fecha,PDO::PARAM_INT);
                    $sql->bindParam(':id',$id,PDO::PARAM_INT);

                    $sql->execute();

                    //Inicializamos la clase Alumno.
                    $miAlumno = new Alumno($nombre,$apellidos,$email,$pass,$telefono,$sexo,$fecha);
                    
                    if($sql->rowCount() > 0){
                        //$count = $sql -> rowCount();

                        //Como tado ha ido bien, actualizamos el json  
                        //comprobacion le damos el valor.
                        $comprobacion = "true";
                        //Al igual que el mensaje.
                        $message = "Alumno con [id:$id] modificado con exito en la BaseDatos";

                        //Creamos el JSON
                        $miAlumno->creaJson($comprobacion,$message,$nombre,$apellidos,$email,$pass,$telefono,$sexo,$fecha);

                        echo "<div class='content alert alert-primary' > 
                        Gracias: $nombre, su registro ha sido actualizado  </div>";
                    }
                    else{
                        //No ha ido bien pero actualizamos el json =mente
                        //comprobacion le damos el valor.
                        $comprobacion = "false";
                        //Al igual que el mensaje.
                        $message = "Alumno con [id:$id] error al modificar en la BaseDatos";

                        //Creamos el JSON
                        $miAlumno->creaJson($comprobacion,$message,$nombre,$apellidos,$email,$pass,$telefono,$sexo,$fecha);

                        echo "<div class='content alert alert-danger'> No se pudo actualizar el registro  </div>";
                        print_r($sql->errorInfo()); 
                    }
                }
                echo "</tbody></table><a href='modificarUsuario.php' class='btn btn-info btnVolver'>Volver</a>";
            ?>
        </div>
    </body>
</html>