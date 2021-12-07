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


                //Variables que captamos del formulario.
                if(ISSET($_GET["id"])){
                    //Variable que recibimos por GET
                    $idModificar = $_GET["id"];

                    //Creamos una consulta para ver si existe dicho usuario.
                    $resultado = $conexion_db->query("SELECT id,nombre,apellidos,password,telefono,email,sexo,fecha_nacimiento FROM alumno WHERE id=$idModificar");
                    if($resultado){
                        $row = $resultado->fetch();
                        //comprobamos si existe el id o no.
                        if(is_countable($row)){
                            //Declaramos las variables del alumno a modificar
                            $id = $row[0];
                            $nombre = $row[1];  
                            $apellidos = $row[2];
                            $pass = $row[3];
                            $telefono = $row[4];
                            $email = $row[5];
                            $sexo = $row[6];
                            $fecha = $row[7];

                            echo "<form method='GET' action='modificarUsuario2.php'>
                            <div class='row'>
                            <h2>Formulario de modificar registro</h2>
                            <p>Nombre</p>
                            <input type='text' id='txtNombre' name='txtNombre' class='input-group-text' value='$nombre' />
                            <p>Apellidos</p>
                            <input type='text' id='txtApellidos' name='txtApellidos' class='input-group-text' value='$apellidos'  />
                            <p>Email</p>
                            <input type='email' id='txtEmail' name='txtEmail' class='input-group-text' value='$email' />
                            <p>Contraseña</p>
                            <input type='password' id='txtPass' name='txtPass' class='input-group-text' value='$pass' />
                            <p>Numero</p>
                            <input type='text' id='txtNumero' name='txtNumero' class='input-group-text' value='$telefono' />
                            <p>Sexo</p>
                            <input type='text' id='txtSexo' name='txtSexo' class='input-group-text' value='$sexo' />
                            <p>Fecha Nacimiento</p>
                            <input type='date' id='txtFecha' name='txtFecha' class='input-group-text' value='$fecha' />
                            <input type='submit' class='btn btn-outline-success miSubmit' value='Modificar' />
                            <input type='hidden' name='miOculto' value='$id'/>
                            </div>
                            </form>";
                            }   
                            else{
                                echo "<div class='row'><h4 class='alert alert-danger'>NO existe ningun alumno con ese Id.</h4></div>";
                            }  
                    }

                                                    
                        echo "</tbody></table><a href='modificarUsuario.php' class='btn btn-info btnVolver'>Volver</a>";                   
                }
                else{
                    echo "<form method='GET' action='modificarUsuario.php'>
                    <div class='row'>
                        <h2>Introduzca el id a modificar: </h2>                        
                        <input type='number' id='txtId' name='id' class='input-group-text' />                        
                        <input type='submit' class='btn btn-outline-success miSubmit' value='Enviar' />
                    </div>
                </form>";
                }
            ?>
        </div>
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