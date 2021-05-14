<?PHP
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:./index.php");
  }else {
    $con = mysqli_connect('localhost','root','','final');

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //From here
    $valido = true;
    $borrar=mysqli_query($con,"SELECT p.ID_producto, p.Cant_Almacen, up.Cantidad FROM productos p, carrito up WHERE p.ID_producto=up.ID_producto AND ID_usuario='{$_SESSION['sess_user']}' AND Pagado=0;");

    while($row = mysqli_fetch_array($borrar)){
      echo "Producto: {$row['ID_producto']}<br>";
      echo "Carrito: {$row['Cant_Almacen']}<br>";
      echo "Usuario: {$row['Cantidad']}<br>";

      $stock = $row['Cant_Almacen'] - $row['Cantidad'];
      if($stock < 0){
        $valido = false;
      }
      echo "Resultado: $stock<br><br><br>";
    }

    if($valido == true){
      echo "Compra valida<br><br>";

      $ejecutar=mysqli_query($con,"SELECT p.ID_producto, p.Cant_Almacen, up.Cantidad FROM productos p, carrito up WHERE p.ID_producto=up.ID_producto AND ID_usuario='{$_SESSION['sess_user']}' AND Pagado=0;");
      while($fila = mysqli_fetch_array($ejecutar)){
        $stock = $fila['Cant_Almacen'] - $fila['Cantidad'];
        mysqli_query($con,"UPDATE productos SET Cant_Almacen=$stock WHERE ID_producto={$fila['ID_producto']}");
      }

      $result = mysqli_query($con,"UPDATE carrito SET Pagado=1  WHERE ID_usuario='{$_SESSION['sess_user']}' AND Pagado=0");
      header("Location: ./history.php");
    }else{
      header("Location: ./buyError.php");
    }

    //to here
  }
?>