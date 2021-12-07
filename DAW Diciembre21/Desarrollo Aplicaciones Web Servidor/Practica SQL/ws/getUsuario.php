<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Visualizar Usuario</title>
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

                //Si tenemos variable filtramos y mostramos toda la info de dicho alumno
                if(ISSET($_GET["id"])){
                    $idBuscar = $_GET["id"];

                    $resultado = $conexion_db->query("SELECT id,nombre,apellidos,password,telefono,email,sexo,fecha_nacimiento FROM alumno WHERE id=$idBuscar");

                    
                    if($resultado){                                    
                        $row = $resultado->fetch();

                        if(is_countable($row)){
                            print "<table class='table table-dark miTabla'><thead><tr><th>ID</th>
                            <th>Nombre</th><th>Apellidos</th><th>Password</th><th>Telefono</th>
                            <th>Email</th><th>Sexo</th><th>Fecha Nacimiento</th></tr></thead><tbody>"; 
                            print "<tr><th>$row[0]</th><th>$row[1]</th><th>$row[2]</th><th>$row[3]</th><th>$row[4]</th><th>$row[5]</th>
                            <th>$row[6]</th><th>$row[7]</th></tr>";
                        }
                        else{
                            //como no existe ningun registro con esa id, mostramos mensaje y ponemos boton de volver
                            print "<div class='row'><h4 class='alert alert-danger' style='text-align:center'>NO existe ningun registro con ese Id.</h4></div>";
                        }
                                            
                        print "</tbody></table><a href='getUsuario.php' class='btn btn-info btnVolver'>Volver</a>";
                    }
                    else{
                        //se ha generado algun tipo de error y por ello no podemos continuar
                        print "<div class='row'><h4 class='alert alert-danger'>Se ha producido un error con ese Id.</h4><a href='getUsuario.php' class='btn btn-info'>Volver</a></div>";
                    }
                }

                //Como no tenemos id, mostramos todo y un pequeño form para buscar un id en concreto.
                else{
                    $resultado = $conexion_db->query('SELECT id,nombre,apellidos,password,telefono,email,sexo,fecha_nacimiento FROM alumno');
                    if($resultado){
                        print "<div class='row'><h3 style='text-align:center;'>Listado de Alumnos</h3></div><table class='table table-dark miTabla'><thead><tr><th>ID</th>
                        <th>Nombre</th><th>Apellidos</th><th>Password</th><th>Telefono</th>
                        <th>Email</th><th>Sexo</th><th>Fecha Nacimiento</th></tr></thead><tbody>";
                        while ($row = $resultado->fetch()){                            
                            print "<tr><th>$row[0]</th><th>$row[1]</th><th>$row[2]</th><th>$row[3]</th><th>$row[4]</th><th>$row[5]</th>
                            <th>$row[6]</th><th>$row[7]</th></tr>";                                                
                        }
                        echo "</tbody></table><form method='GET' action='getUsuario.php'>
                            <div class='row'><h2>Introduzca el id a buscar: </h2><input type='number' id='txtId' name='id' class='input-group-text' />                        
                                <input type='submit' class='btn btn-outline-success miSubmit' value='Enviar' /></div>
                            </form>";
                    }
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