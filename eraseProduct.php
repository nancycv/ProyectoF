<?PHP
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:./index.php");
  }else{
    $admin = $_SESSION['sess_user'];
    if($admin != '222'){
        header("Location:./index.php");
    }
  }

    $con = mysqli_connect('localhost','root','','final');

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con,"DELETE FROM productos WHERE ID_producto={$_POST['ID_producto']}");
    header("Location: ./editProducts.php");
?>
