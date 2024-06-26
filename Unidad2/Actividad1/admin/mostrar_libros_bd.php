<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/disen.css">
</head>
<body>
<?php
if($_POST){
    require_once "../config/config.php";
    $cons=$_POST['cons'];
    mysqli_set_charset($link,"utf8");
    if ($cons != ''){

    }
    $sql=mysqli_query($link, "SELECT * FROM libros WHERE isbn='$cons'");
    $errores = [];
    while($consulta= mysqli_fetch_array($sql)){
        $consulta['isbn'];
        $isbn=$consulta['isbn'];
        $name=$consulta['nombre'];
        $author=$consulta['autor'];
        $price=$consulta['precio'];
        $publisher=$consulta['editorial'];
        $image=$consulta['imagen'];
        if ($isbn === '') {
            $errores[] = 'ISBN';
        }
        if ($name === '') {
            $errores[] = 'Nombre';
        }
        if ($author === '') {
            $errores[] = 'Autor';
        }
        if ($price === '') {
            $errores[] = 'Precio';
        }
        if ($publisher === '') {
            $errores[] = 'Editorial';
        }
        if ($image === '') {
            $errores[] = 'Imagen';
        }
        foreach ($errores as $error) {
            echo $error;
        }
    }

    if (empty($errores)) {

        echo '<script>alert("Mostrando Libro")</script>';
    }
    else {
        echo '<script>alert("El ISBN especificado no se encuentra en la Base de Datos")</script>';
    }
}

?>
<div class="p1">
    <div class="back1">
        <a href="../index.php"> Regresar</a>

        <form method="POST" name="formulario" action="mostrar_libros_bd.php">

            <table>
                <tr>
                    <th><label for="cons">ISBN del libro a consultar:</label></th>
                    <td><input type="text" name="cons" value="<?php if(isset($_POST['cons']))echo $_POST['cons'];?>" placeholder="Ingrese el isbn del libro" ></td>
                    <td><input type="submit" value="Mostrar Libro"></td>
                </tr>
                <tr><th><h4>Consulta:</h4></th></tr>
                <tr>
                    <th><label for="isbn">ISBN:</label></th>
                   <td><input type="text" name="isbn" value="<?php if(isset($isbn))echo $isbn; ?>" placeholder="ISBN" disabled></td>
                </tr>
                <tr>
                    <th><label for="name">NOMBRE:</label></th>
                    <td><input type="text" name="name" value="<?php if(isset($name))echo $name; ?>" placeholder="Nombre" disabled></td>
                </tr>
                <tr>
                    <th><label for="autor">AUTOR:</label></th>
                    <td><input type="text" name="autor" value="<?php if(isset($author))echo $author; ?>" placeholder="Autor" disabled></td>
                </tr>
                <tr>
                    <th><label for="precio">PRECIO:</label></th>
                    <td><input type="text" name="precio" value="<?php if(isset($price))echo $price; ?>" placeholder="Precio" disabled></td>
                </tr>
                <tr>
                    <th><label for="editorial">EDITORIAL:</label></th>
                    <td><input type="text" name="editorial" value="<?php if(isset($publisher))echo $publisher; ?>" placeholder="Editorial" disabled></td>
                </tr>
                <tr>
                    <th><label for="imagen">IMAGEN:</label></th>
                    <td><image src="<?php if(isset($image))echo $image; ?>" width="200px"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>