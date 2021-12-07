<!DOCTYPE html>
    <html lang="es"> <!--en la etiqueta html, ya indicamos el idioma de la web -->
    <head>
    <meta charset="UTF-8"> <!-- también decimos el tipo de codificación, para que caracteres como la ñ o determinados acentos, se muestren con normalidad.-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica1 PHP  - Jose Sánchez Mateo</title>

    <!--Libreria bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!--Aquí va nuestro estilo para la web-->
    <link rel="stylesheet" type="text/css" href="../css/contacto.css">

    </head>
    <body>
        <header>
        </header>
        <!-- Ahora empezamos con la sección primera-->
        <!-- Primero añadimos contenedor para el logotipo de la empresa -->
        <section class="container miFormu">
            <?php
            
            require_once("./interfaces/IToJson.php");              
            require_once("./models/User.php");

            // Desactivar toda las notificaciónes del PHP
            error_reporting(0);                                           
                
                //declaramos las variables que recibimos del formulario.
                $nombre = $_POST['txtNombre'];
                $ape = $_POST['txtapellidos'];
                $email = $_POST['txtEmail'];
                $pass = $_POST['txtpassword'];
                $number = $_POST['txtNumero'];
                $sex = $_POST['txtaa'];
                
                //Declaramos el contenido del Json.
                $array = array("Nombre" => $nombre, "apellidos" => $ape, "email" => $email, "pass" => $pass, "number" => $number, "sex" => $sex);

                //Declaramos el archivo Json
                $miArchivo = "personas.json";

                //cargamos el Json
                $contenido = file_get_contents($miArchivo);
                
                //Codificamos a UTF-8 por si
                $codificado = utf8_encode($contenido);
                
                //Primero de todo, debemos saber si el archivo Json externo existe o no.
                if(file_exists($miArchivo)){                            
                    $data = json_decode($codificado);
                    array_push($data,$array);
                    file_put_contents($miArchivo, json_encode($data));       
                                     
                    $miUsuario = new User($nombre,$ape,$email,$pass,$number,$sex);
                    
                    echo $miUsuario;
                    
                    echo "<div class='row'><h4 style='margin-top:100px;'>Mostrando todos los datos: </h4></div>";   
                    $miUsuario->toJson($data);
                    
                }
                else{
                    $data = array();
                    array_push($data,$array);
                    $f = fopen($miArchivo,"w");
                    fwrite($f, json_encode($data));
                    fclose($f);

                    $miUsuario = new User($nombre,$ape,$email,$pass,$number,$sex);                    
                    echo $miUsuario;

                    echo "<div class='row'><h4 style='margin-top:100px;'>Usted es el primer registro del archivo <strong>JSON</strong> </h4></div>";                   

                }                                              
            ?>
        </section>
        <footer>
        </footer>
    </body>
</html>