<?PHP
session_start();

include_once "../db_connection.php";
include_once "../functions/prepared_statements.php";
include_once "../functions/print_tables.php";
?>
<!DOCTYPE>
<?PHP
$admin_email = $_POST['admin_email'];
$admin_password = $_POST['admin_password'];

if ( isset( $_POST['Login'] ) )
{
  $sql = "SELECT * FROM admin WHERE admin_email='$admin_email'";
  $tabell = mysqli_query($conn, $sql) or die (mysqli_error($conn));

  if(mysqli_num_rows($tabell)==0)
  {
    echo "<div id='response-add' class='bg-danger text-white response_hide text-center p-2'>Epostadressen hittades inte.</div>";
  }else{
    while($rad = $tabell ->fetch_assoc()){
      if (password_verify($admin_password,$rad['admin_password'])) {
        $_SESSION['admin_id'] = $rad['admin_id'];
        $_SESSION['admin_name'] = $rad['admin_name'];
        echo '<script>window.location.href = "overview.php";</script>';
      } else {
        echo "<div id='response-add' class='bg-danger text-white response_hide text-center p-2'>Lösenordet hittades inte.</div>";
      }
    }
  }
}

?>
<!DOCTYPE>
<html>
<head>
  <?PHP include_once "header.php"; ?>
</head>
<body>
  <div class="outer_container pt-4 px-5"><h1 class="text-center">Inloggning STC Admin</h1>

  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="form-group">
      <label for="admin_email">Epost:</label>
      <input type="email" id="admin_email" name="admin_email" class="form-control " placeholder="Din epostadress, tack." >
    </div>

    <div class="form-group">
      <label for="admin_password">Lösenord:</label>
      <input type="password" id="admin_password" name="admin_password" class="form-control " placeholder="Ditt lösenord, tack." >
    </div>
      <button type='submit' Name = 'Login'  class='btn btn-primary'>Logga in</button>
  </form>
</div>
  <?PHP include_once "footer.php"; ?>

</body>
</html>
