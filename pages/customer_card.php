<?PHP
session_start();
include_once "../db_connection.php";
include_once "../functions/prepared_statements.php";
include_once "../functions/print_tables.php";
?>
<!DOCTYPE>
<?PHP

  if ( isset( $_POST['Add'] ) )
  {

    $customer_id = $_POST['customer_id'];
    $customer_id_in = $_POST['customer_id'];
    $customer_firstname = $_POST['customer_firstname'];
    $customer_lastname = $_POST['customer_lastname'];
    $customer_email = $_POST['customer_email'];
    $customer_password = $_POST['customer_password'];
    $customer_address= $_POST['customer_address'];
    $customer_zip= $_POST['customer_zip'];
    $customer_city= $_POST['customer_city'];
    $customer_latest_login= $_POST['customer_latest_login'];

    $date = new DateTime();$date_out = $date->format('Y-m-d H:i:s');
    $customer_password_hash = password_hash($admin_password, PASSWORD_BCRYPT);
    $sql_update = $conn->query("INSERT INTO customer
      SET
      customer_firstname='$customer_firstname',
      customer_lastname='$customer_lastname',
      customer_email='$customer_email',
      customer_password='$customer_password_hash',
      customer_address='$customer_address',
      customer_zip='$customer_zip',
      customer_city='$customer_city',
      customer_latest_login='$date_out'
      ");
      echo '<script>window.location.href = "cart_checkout.php";</script>';
  }else{
    //Generate a new customer id.
    $date = new DateTime();$date_out = $date->format('Y-m-d H:i:s');
    $sql_update = $conn->query("INSERT INTO customer SET customer_latest_login='$date_out'");

      $fetch_latest_post = mysqli_query($conn,"SELECT customer_id FROM customer ORDER BY customer_id DESC LIMIT 1");
          while($latest_post_row = mysqli_fetch_assoc($fetch_latest_post))
          {
            $customer_id_in =   $latest_post_row["customer_id"];
            $_SESSION['customer_id'] = $latest_post_row["customer_id"];
          }
  }

?>
<html>
  <head>
  <?PHP include_once "../admin/header.php"; ?>
  </head>
  <body>

    <div class="outer_container pt-4 px-5"><h1 class="text-center">Registrera dig här</h1>
      <?PHP
        if (!$customer_id_in)
        {
          echo "<h3 class='text-center pb-4'>Lägg till ny kund</h3>";
          echo"  <div id='response' class='mb-3'></div>";
          include "customer_form.php";
        }else{
          echo "<h3 class='text-center pb-4'>Uppdatera kund</h3>";
          echo"  <div id='response' class='mb-3'></div>";
          $sql = select_one_post("customer", "*", "customer_id", $customer_id_in );
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {while($row = mysqli_fetch_assoc($result)) {include "customer_form.php";}}
        }
      ?>
    </div><!-- END outer_container-->

    <?PHP include_once "../admin/footer.php"; ?>
    <?PHP
      if (isset($_POST['Add']))
      {
        echo "<script>
          $(function (){
            function response()
            {
              $('#response').html(\"<div id='response-add' class='bg-success text-white response_hide text-center p-2'>Uppgifterna är sparad.</div>\");
            }
            response();
          });
        </script>";
      }
    ?>
  </body>
</html>
