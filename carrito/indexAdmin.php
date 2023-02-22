<?php

session_start();
if(!isset($_SESSION["Usuario"])){
    header('Location: ./admin/admin.php');
}
$_SESSION["Usuario"];


include 'Configuracion.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Index Usuario</title>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src="../js/bootstrap.bundle.min.js"></script>
    
    <style>
   
   .container{
    margin-top: 50px;
    width: 80%;
   }

    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid">
  <a class="navbar-brand" href="http://localhost/proyectoPrueba/">
      <img src="../img/logo2.png" alt="Logo fruver´s" width="40" height="40" class="d-inline-block align-text-center " style="border-radius: 1000px;">
      Fruver's
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/proyectoPrueba/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/proyectoPrueba/carrito/usuariosRegistrados.php">Usuarios</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/proyectoPrueba/vistas/contacto.php">contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/proyectoPrueba/carrito/pedidos.php">Pedidos</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-light me-5" type="submit">Buscar</button>
        <div class="col-sm-4 clearfix">
                    <a class="btn btn-secondary float-end rounded-0 mt-2 me-2" type="button" href="../admin/cerrarSesion.php">
                        <i class="bi bi-box-arrow-right"></i>Cerrar Sesión
                    </a>
                </div>
    </div>
    
  </div>
  
</nav>
   
<!--<div class="container">
<div class="panel panel-default">
<div class="panel-heading mt-5"> -->


</div>
  <div class="row">
    <div class="col-9">
    <h1 class="mt-5">Productos Registrados</h1>
    </div>
    <div class="col-3 mt-5">
    <a href="../productos/productos.php" class="btn btn-success">Agregar Producto</a>

    </div>
    <?php
//quitar notificaciones de error de php
error_reporting(0);
//importa las variables de conexion
require_once('conexion.php');
//conectar a la base de datos escuela con mysqli
$con = mysqli_connect($hostname, $username, $password, $database);
//comprobar la conexion
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<!-- crear link que mande al archivo insertar.php -->

<!-- crear una tabla con los datos de la tabla alumnos -->
<div class="container">
<table class="table table-striped table-hover">
    <tr>
        
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Código</th>
        <th>Categoria</th>
        <th>Imagen</th>
        <th>Accion</th>
    </tr>
    <?php
    //crear la consulta
    $query = "SELECT * FROM PRODUCTOS";
    //ejecutar la consulta
    $result = mysqli_query($con, $query);
    //recorrer el resultado de la consulta
    ?>
    <tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <td class="td"><?php echo $row["nombre"]; ?></td>
                        <td class="td"><?php echo $row["descripcion"]; ?></td>
                        <td class="td"><?php echo '$'.$row["precio"]; ?></td>
                        <td class="td"><?php echo$row["codigo"]; ?></td>
                        <td class="td"><?php echo $row["categoria"]; ?></td>
                        <td><img src="<?php echo  $row["imagen"]; ?>"  width="50px"  alt=""></td> 
            
            <td><a type="button" class="btn btn-success" href="editar.php?id=<?php echo $row['id'];?>">Editar</a>
        </tr>
        <?php
    }
    ?>
</table>
</div>
<?php
//cerrar la conexion
mysqli_close($con);
?>  
    <?php
include '../vistas/footer.php';
    ?>
    
</body>
</html>