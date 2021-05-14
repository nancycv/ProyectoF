<?php
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:./index.php");
  }else {
    $product = $_POST['product'];
    $Cantidad = $_POST['Cantidad'];

    $con = mysqli_connect('localhost','root','','final');
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $quantity = mysqli_query($con,"SELECT Cantidad FROM carrito WHERE ID_usuario='{$_SESSION['sess_user']}' AND ID_producto=$product AND Pagado=0");

    $resul_cant = mysqli_fetch_array($quantity);
    if($resul_cant['Cant_Almacen']>0){
      echo "act";
      $Cantidad = $Cantidad + $resul_cant['Cant_almacen'];
      mysqli_query($con,"UPDATE carrito SET Cantidad = $Cantidad WHERE ID_usuario='{$_SESSION['sess_user']}' AND ID_producto=$product AND Pagado=0");
    }else{
      echo "ins";
      $insert = "INSERT INTO carrito VALUES"."('{$_SESSION['sess_user']}',"."$product, 0, $Cantidad)";
      $result = mysqli_query($con,$insert);
    }

    header("Location:./kart.php");

  }
?>