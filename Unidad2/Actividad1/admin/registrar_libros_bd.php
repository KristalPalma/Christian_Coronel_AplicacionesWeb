<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/disen.css">
</head>
<body>
<div class="p1">
    <div class="back1">
<a href="../index.php"> Regresar</a>
<form method="POST" name="RegistrarLibro" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

    <table>
        <tr>
        <th><label for="isbn">ISBN</label></th>
        <td><input type="text" name="isbn" placeholder="Ingrese el isbn"></td>
        </tr>
        <tr>
        <th><label for="name">NOMBRE:</label></th>
        <td><input type="text" name="name" placeholder="Ingrese el nombre"></td>
        </tr>
        <tr>
        <th><label for="autor">AUTOR:</label></th>
        <td><input type="text" name="autor" placeholder="Ingrese el autor"></td>
        </tr>
        <tr>
        <th><label for="precio">PRECIO:</label></th>
        <td><input type="number" name="precio" placeholder="Ingrese el precio" step="0.01"></td>
        </tr>
        <tr>
        <th><label for="editorial">EDITORIAL:</label></th>
        <td><input type="text" name="editorial" placeholder="Ingrese la editorial"></td>
        </tr>
        <tr>
        <th><label for="imagen">IMAGEN:</label></th>
        <td><input type="text" name="imagen" placeholder="Ingrese el url de imagen"></td>
        </tr>
    </table>

    <input type="submit" hidden>
</form>
    </div>
</div>

<?php
if($_POST){
    $errores = [];
    $isbn=$_POST['isbn'];
    $name=$_POST['name'];
    $author=$_POST['autor'];
    $price=$_POST['precio'];
    $publisher=$_POST['editorial'];
    $image=$_POST['imagen'];

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

if (empty($errores)) {
    require_once "../config/config.php";
    mysqli_set_charset($link,"utf8");

    $sql= "INSERT INTO libros (isbn, nombre, autor, precio, editorial, imagen)
        VALUES ('$isbn', '$name', '$author', '$price', '$publisher', '$image')";
    $resultado = mysqli_query($link, $sql);
}else{
    echo '<script>alert("Se necesita especificar: '; foreach ($errores as $error){ echo $error . ', '; } echo '")</script>';
    }
}
?>
</body>
</html>