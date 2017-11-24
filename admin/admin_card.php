<?PHP require "include_at_top.php"; ?>
<?PHP
$admin_id_in = $_GET["admin_id"];

if (!$admin_id_in)
{
  $admin_id = $_POST['admin_id'];
  $admin_id_in = $_POST['admin_id'];
  $admin_name = $_POST['admin_name'];
  $admin_email = $_POST['admin_email'];
  $admin_password = $_POST['admin_password'];

  if ( isset( $_POST['Add'] ) )
  {
    $admin_password_hash = password_hash($admin_password, PASSWORD_BCRYPT);
    $sql_update = $conn->query("INSERT INTO admin
      SET
      admin_name='$admin_name',
      admin_email='$admin_email',
      admin_password='$admin_password_hash'
      ");


  $fetch_latest_post = mysqli_query($conn,"SELECT admin_id FROM admin ORDER BY admin_id DESC LIMIT 1");
      while($latest_post_row = mysqli_fetch_assoc($fetch_latest_post))
      {
        $admin_id_in =   $latest_post_row["admin_id"];
      }

  }
  if ( isset( $_POST['Update'] ) )
  {
    $sql_update = $conn->query("UPDATE admin
      SET
      admin_name='$admin_name',
      admin_email='$admin_email',
      admin_password='$admin_password'
      WHERE admin_id=$admin_id");

  }
}
?>
<html>
  <head>
  <?PHP include_once "header.php"; ?>
  </head>
  <body>
    <?PHP include_once "admin_navbar.php"; ?>

    <div class="outer_container pt-4 px-5"><h1 class="text-center">Adminkort</h1>
      <?PHP
        if (!$admin_id_in)
        {
          echo "<h3 class='text-center pb-4'>Lägg till ny admin</h3>";
          echo"  <div id='response' class='mb-3'></div>";
          include "admin_form.php";
        }else{
          echo "<h3 class='text-center pb-4'>Uppdatera admin</h3>";
          echo"  <div id='response' class='mb-3'></div>";
          $sql = select_one_post("admin", "*", "admin_id", $admin_id_in );
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {while($row = mysqli_fetch_assoc($result)) {include "admin_form.php";}}
        }
      ?>
    </div><!-- END outer_container-->

    <?PHP include_once "footer.php"; ?>
    <?PHP
      if (isset($_POST['Add']) || isset($_POST['Update']))
      {
        echo "<script>
          $(function (){
            function response()
            {
              $('#response').html(\"<div id='response-add' class='bg-success text-white response_hide text-center p-2'>Admin är sparad.</div>\");
            }
            response();
          });
        </script>";
      }
    ?>

  </body>
</html>
