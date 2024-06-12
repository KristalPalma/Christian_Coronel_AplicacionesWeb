<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<?php
if($_POST){
    require_once "config.php";
    $cons=$_POST['cons'];

    mysqli_set_charset($link,"utf8");
    $sql=mysqli_query($link, "SELECT * FROM libros WHERE isbn='$cons'");
    while($consulta= mysqli_fetch_array($sql)){
        $consulta['isbn'];
        $isbn=$consulta['isbn'];
        $name=$consulta['nombre'];
        $author=$consulta['autor'];
        $price=$consulta['precio'];
        $publisher=$consulta['editorial'];
        $image=$consulta['imagen'];


    }
}?>
<div class="p1">
    <div class="back1">

        <form method="POST" name="formulario" action="mostrar_libros_bd.php">
            <label for="cons">ISBN DEL LIBRO A CONSULTAR:</label><br>
            <p><input type="text" name="cons" value="<?php if(isset($_POST['cons']))echo $_POST['cons'];?>" placeholder="Ingrese el isbn del libro" ></p>

            <label for="isbn">ISBN:</label><br>
            <p><input type="text" name="isbn" value="<?php if(isset($isbn))echo $isbn; ?>" placeholder="ISBN" disabled></p>

            <label for="name">NOMBRE:</label><br>
            <p><input type="text" name="name" value="<?php if(isset($name))echo $name; ?>" placeholder="Nombre" disabled></p>

            <label for="autor">AUTOR:</label><br>
            <p><input type="text" name="autor" value="<?php if(isset($author))echo $author; ?>" placeholder="Autor" disabled></p>

            <label for="precio">PRECIO:</label><br>
            <p><input type="text" name="precio" value="<?php if(isset($price))echo $price; ?>" placeholder="Precio" disabled></p>

            <label for="editorial">EDITORIAL:</label><br>
            <p><input type="text" name="editorial" value="<?php if(isset($publisher))echo $publisher; ?>" placeholder="Editorial" disabled></p>

            <label for="imagen">IMAGEN:</label><br>
            <p><image src="<?php if(isset($image))echo $image; ?>" width="200px"></p>

            <input type="submit" hidden>
        </form>
    </div>
</div>

<style>
    body {
        background: url(https://wallpaperwaifu.com/wp-content/uploads/2022/01/cyberpunk-2077-night-city-thumb.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        margin: 0;
        height: 100vh;
    }

    .back1{
        padding: 5% 15%;
        background-color: gray;
        background-position: center;
        background-repeat: repeat;
        background-origin: padding-box;
        margin: 0px 25%;
    }

    .p1 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 15px;
        text-align: left;
    }
</style>
</body>
</html>