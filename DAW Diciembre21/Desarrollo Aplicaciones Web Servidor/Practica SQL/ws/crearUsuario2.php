<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Usuario</title>
        <!--Libreria bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
         
        <!--Aquí va nuestro estilo para la web-->
        <link rel="stylesheet" type="text/css" href="../css/myStile.css">

    </head>
    <body>
        <?php
            //Requerimos la clase Alumno y la conexión con la BD.
            require("conexion.php");
            require("Usuario.php");


            //Variables que captamos del formulario.
            $nombre = $_GET["txtNombre"];
            $apellidos = $_GET["txtApellidos"];
            $email = $_GET["txtEmail"];
            $pass = $_GET["txtPass"];
            $telefono = $_GET["txtNumero"];
            $sexo = $_GET["txtSexo"];
            $fecha = $_GET["txtFecha"];

            //Creamos validacion para sexo
            if($sexo == "Hombre" || $sexo == "hombre" || $sexo == "HOMBRE" || $sexo == "H" || $sexo == "h") $sexo = "H";
            else $sexo = "M";

            
            //Inicializamos la clase Alumno.
            $miAlumno = new Alumno($nombre,$apellidos,$email,$pass,$telefono,$sexo,$fecha);

            //Comprobamos que los campos que queremos que no vengan vacios, no esten vacios.
            if(isset($_GET["txtNombre"]) || isset($_GET["txtApellidos"]) || isset($_GET["txtEmail"]) || isset($_GET["txtPass"])){


                //Creamos una consulta para ver si existe dicho usuario.
                $consulta = 'SELECT email FROM alumno WHERE email= :email';

                $estado = $conexion_db->prepare($consulta);
                $estado->bindParam(':email', $email, PDO::PARAM_INT);
                $estado->execute();
                $emailBD = $estado->fetch(PDO::FETCH_ASSOC);

                //Si lo encontramos, no permitimos el registro, puesto que no es viable tener 2 emails =les para un registro de tipo login.
                if ($emailBD) {
                    //Por tanto comptrobacion ya es verdadera.
                    $comprobacion = false;  
                    //y mensaje también lo podemos rellenar.
                    $message = "Alumno no insertado en la Base de Datos";


                    //Creamos el JSON
                    $miAlumno->creaJson($comprobacion,$message,$nombre,$apellidos,$email,$pass,$telefono,$sexo,$fecha); 

                    echo "<div class='row'><h4 class='alert alert-danger'>Ya existe un alumno con ese email[$email]</h4></div>";
                    echo "<a href='../formulario.htm' class='btn btn-info btnVolver'>Volver</a>";
                }
                //como no esta en la BD, procedemos al registro.
                else{
                    
                    //Preparamos el INSERT
                    $sql="INSERT INTO alumno(nombre,apellidos,email,password,telefono,sexo,fecha_nacimiento) 
                    VALUES (:nombre,:apellidos,:email,:contrasena,:telefono,:sexo,:fecha_nacimiento)";

                    //Preparamos la sentencia
                    $sentencia=$conexion_db->prepare($sql);

                    //comprobacion lo dejamos sin valor hasta el siguiente bucle.
                    $comprobacion = "";
                    //Al igual que el mensaje.
                    $message = "";




                    //Ejecutamos la sentencia
                    if($sentencia->execute(array(':nombre'=>$nombre,':apellidos'=>$apellidos,':email'=>$email,':contrasena'=>$pass,':telefono'=>$telefono,':sexo'=>$sexo,':fecha_nacimiento'=>$fecha))){

                        //Si estamos dentro es por que todo a ido bien.
                        //Por tanto comprobacion ya es verdadera.
                        $comprobacion = true;  
                        //y mensaje también lo podemos rellenar.
                        $message = "Alumno insertado con exito en la Base de Datos";


                        //Creamos el JSON
                        $miAlumno->creaJson($comprobacion,$message,$nombre,$apellidos,$email,$pass,$telefono,$sexo,$fecha); 

                        //Mostramos div con todo correcto.
                        echo "<div class='content alert alert-primary' ><h3> Gracias .. $nombre,$apellidos tu registro ha sido un exito!. </h3></div>";                         
                    }
                    else{
                        //si estamos en el else, es por que  algo no ha ido bien, por ello, comprobacion es falso.
                        $comprobacion = false;
                        //el mensaje cambia tambien.
                        $message = "No se pueden agregar datos, comuníquese con el administrador!";

                        //Creamos el JSON
                        $miAlumno->creaJson($comprobacion,$message,$nombre,$apellidos,$email,$pass,$telefono,$sexo,$fecha); 

                        //Mostramos div con todo correcto.
                        echo "<div class='content alert alert-danger'> No se pueden agregar datos, comuníquese con el administrador  </div>";
                        print_r($sentencia->errorInfo()); 
                    }
            
                }

            }
            //Los campos nombre,apellidos, email y pass no pueden venir vacios, al venir, damos error.
            else{
                echo "<div class='row'><h4 class='alert alert-danger'>Campos esenciales vacios(Nombre,Apellidos,Email y Contraseña)</h4></div>";
                echo "<a href='../formulario.htm' class='btn btn-info btnVolver'>Volver</a>";
            }
        ?>
        <div class="container miSection">
        <div class="row">
                <div class="col-md-3">
                    <a href="../formulario.htm" class="btn btn-primary">Ingresar usuario</a>
                </div>
                <div class="col-md-3">
                    <a href="./getUsuario.php" class="btn btn-secondary">Obtener usuario</a>
                </div>
                <div class="col-md-3">
                    <a href="./modificarUsuario.php" class="btn btn-warning">Modificar usuario</a>
                </div>
                <div class="col-md-3">
                    <a href="./deleteUsuario.php" class="btn btn-danger">Eliminar usuario</a>
                </div>
            </div>
        </div>
    </body>
</html>