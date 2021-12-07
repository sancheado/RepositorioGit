<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar Usuario</title>
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
                    $idEliminar = $_GET["id"];

                    //Creamos una consulta para ver si existe dicho usuario.
                    $resultado = $conexion_db->query("SELECT id,nombre,apellidos,'password',telefono,email,sexo,fecha_nacimiento FROM alumno WHERE id=$idEliminar");
                    if($resultado){
                        $row = $resultado->fetch();
                        $num_rows = count($row);

                        if($num_rows == 1){
                            //como no existe ningun registro con esa id, mostramos mensaje y ponemos boton de volver
                            print "<div class='row'><h4 class='alert alert-danger'>NO existe ningun registro con ese Id.</h4></div>";

                        }
                        else{

                            print "<table class='table table-dark miTabla'><thead><tr><th>ID</th>
                            <th>Nombre</th><th>Apellidos</th><th>Password</th><th>Telefono</th>
                            <th>Email</th><th>Sexo</th><th>Fecha Nacimiento</th></tr></thead><tbody>";

                            //Declaramos las variables del alumno a eliminar
                            $id = $row[0];
                            $nombre = $row[1];  
                            $apellidos = $row[2];
                            $pass = $row[3];
                            $telefono = $row[4];
                            $email = $row[5];
                            $sexo = $row[6];
                            $fecha = $row[7];

                            //mostramos por pantalla el registro del Alumno.                                
                            print "<tr><th>$row[0]</th><th>$row[1]</th><th>$row[2]</th><th>$row[3]</th><th>$row[4]</th><th>$row[5]</th>
                            <th>$row[6]</th><th>$row[7]</th></tr>";      

                            //Clase Alumno.
                            $miAlumno = new Alumno($nombre,$apellidos,$email,$pass,$telefono,$sexo,$fecha);
                            
                            $sql = "DELETE FROM alumno WHERE id=?";
                            $stmt= $conexion_db->prepare($sql);
                            if($stmt->execute([$idEliminar])){

                                $comprobacion = true;
                                $message = "Usuario con id[$idEliminar] ha sido eliminado con exito!";
                                
                                //LLamamos a la función Json de crearUsuario2.php para actualizar el estado.                          
                                $miAlumno->creaJson($comprobacion,$message,$nombre,$apellidos,$email,$pass,$telefono,$sexo,$fecha);
                                
                                echo "<p class='alert alert-success' style='text-align:center;'>Registro eliminado con exito!</p>";
                            }
                            else{
                                $comprobacion = false;
                                $message = "Usuario con id[$idEliminar] no ha sido eliminado!";
                                
                                //LLamamos a la función Json de crearUsuario2.php para actualizar el estado.                          
                                $miAlumno->creaJson($comprobacion,$message,$nombre,$apellidos,$email,$pass,$telefono,$sexo,$fecha);
                                
                            }
                        }                                       
                        echo "</tbody></table><a href='deleteUsuario.php' class='btn btn-info btnVolver'>Volver</a>";
                    }                    
                }
                else{
                    echo "<form method='GET' action='deleteUsuario.php'>
                    <div class='row'>
                        <h2>Introduzca el id a eliminar: </h2>                        
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