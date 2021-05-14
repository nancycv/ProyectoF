
<?php
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:./index.php");
  }else {
    $product = $_POST['product'];
    $conn = mysqli_connect('localhost','root','','final');
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $result = mysqli_query($conn,"DELETE FROM carrito WHERE ID_producto=$product AND ID_usuario='{$_SESSION['sess_user']}';");
    header("Location:./kart.php");
  }
?>
