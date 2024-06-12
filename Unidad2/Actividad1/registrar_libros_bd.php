<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .body1{ font: 25px sans-serif; text-align: center; }

        body{ font: 16px sans-serif;  }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
<br>

<form method="POST" name="RegistrarLibro" action="registrar_libros_bd.php">
    <label for="isbn">ISBN</label><br>
    <p><input type="text" name="isbn" placeholder="Ingrese el isbn"></p>
    <label for="name">NOMBRE:</label><br>
    <p><input type="text" name="name" placeholder="Ingrese el nombre"></p>
    <label for="autor">AUTOR:</label><br>
    <p><input type="text" name="autor" placeholder="Ingrese el autor"></p>
    <label for="precio">PRECIO:</label><br>
    <p><input type="number" name="precio" placeholder="Ingrese el precio" step="0.01"></p>
    <label for="editorial">EDITORIAL:</label><br>
    <p><input type="text" name="editorial" placeholder="Ingrese la editorial"></p>
    <label for="imagen">IMAGEN:</label><br>
    <p><input type="text" name="imagen" placeholder="Ingrese el url de imagen"></p>

    <input type="submit" hidden>
</form>
<?php
if($_POST){
    $isbn=$_POST['isbn'];
    $name=$_POST['name'];
    $author=$_POST['autor'];
    $price=$_POST['precio'];
    $publisher=$_POST['editorial'];
    $image=$_POST['imagen'];

    require_once "config.php";

    mysqli_set_charset($link,"utf8");

    $sql= "INSERT INTO libros (isbn, nombre, autor, precio, editorial, imagen)
        VALUES ('$isbn', '$name', '$author', '$price', '$publisher', '$image')";
    $resultado = mysqli_query($link, $sql);

} ?>
</html>
</body>
