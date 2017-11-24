<?PHP require "include_at_top.php"; ?>
<?PHP
$product_id_in = $_GET["product_id"];

if (!$product_id_in)
{
  $product_id = $_POST['product_id'];
  $product_id_in = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_description = $_POST['product_description'];
  $product_cost = $_POST['product_cost'];
  $product_quantity = $_POST['product_quantity'];
  $product_color = $_POST['product_color'];
  $product_tag = $_POST['product_tag'];
  $product_image3 = $_POST['product_image3'];

  if ( isset( $_POST['Add'] ) )
  {
    $sql_update = $conn->query("INSERT INTO product
      SET product_name='$product_name',product_description='$product_description',
      product_cost='$product_cost',product_quantity='$product_quantity',
      product_image3='$product_image3',
      product_color='$product_color', product_tag='$product_tag'");
      $product_id_in = $_POST['product_id'];

  $fetch_latest_post = mysqli_query($conn,"SELECT product_id FROM product ORDER BY product_id DESC LIMIT 1");
      while($latest_post_row = mysqli_fetch_assoc($fetch_latest_post))
      {
        $product_id_in =   $latest_post_row["product_id"];
      }
  }

  if ( isset( $_POST['Update'] ) )
  {
    $sql_update = $conn->query("UPDATE product
      SET product_name='$product_name',product_description='$product_description',
      product_cost='$product_cost',product_quantity='$product_quantity',
      product_image3='$product_image3',
      product_color='$product_color', product_tag='$product_tag'
      WHERE product_id=$product_id");
  }

  if ( isset( $_POST['GetImg1'] ) )
  {
      if (strlen($product_id)==0)
      {
        $sql_update = $conn->query("INSERT INTO product
        SET product_name='$product_name',product_description='$product_description',
        product_cost='$product_cost',product_quantity='$product_quantity',
        product_image3='$product_image3',
        product_color='$product_color', product_tag='$product_tag'");
        $product_id_in = $_POST['product_id'];

        $fetch_latest_post = mysqli_query($conn,"SELECT product_id FROM product ORDER BY product_id DESC LIMIT 1");
        while($latest_post_row = mysqli_fetch_assoc($fetch_latest_post))
        {
          $product_id_in =   $latest_post_row["product_id"];
        }
        echo "<script>window.location.href = 'pick_pics.php?product_id=".$product_id_in."&color_row=1';</script>";
      }else{
        $sql_update = $conn->query("UPDATE product
          SET product_name='$product_name',product_description='$product_description',
          product_cost='$product_cost',product_quantity='$product_quantity',
          product_image3='$product_image3',
          product_color='$product_color', product_tag='$product_tag'
          WHERE product_id=$product_id");
          echo "<script>window.location.href = 'pick_pics.php?product_id=".$product_id_in."&color_row=1';</script>";
      }
  }

  if ( isset( $_POST['GetImg2'] ) )
  {
      if (strlen($product_id)==0)
      {
        $sql_update = $conn->query("INSERT INTO product
        SET product_name='$product_name',product_description='$product_description',
        product_cost='$product_cost',product_quantity='$product_quantity',
        product_image3='$product_image3',
        product_color='$product_color', product_tag='$product_tag'");
        $product_id_in = $_POST['product_id'];

        $fetch_latest_post = mysqli_query($conn,"SELECT product_id FROM product ORDER BY product_id DESC LIMIT 1");
        while($latest_post_row = mysqli_fetch_assoc($fetch_latest_post))
        {
          $product_id_in =   $latest_post_row["product_id"];
        }
        echo "<script>window.location.href = 'pick_pics.php?product_id=".$product_id_in."&color_row=2';</script>";
      }else{
        $sql_update = $conn->query("UPDATE product
          SET product_name='$product_name',product_description='$product_description',
          product_cost='$product_cost',product_quantity='$product_quantity',
          product_image3='$product_image3',
          product_color='$product_color', product_tag='$product_tag'
          WHERE product_id=$product_id");
          echo "<script>window.location.href = 'pick_pics.php?product_id=".$product_id_in."&color_row=2';</script>";
      }
  }
}
?>
<html>
  <head>
  <?PHP include_once "header.php"; ?>
  </head>
  <body>
    <?PHP include_once "admin_navbar.php"; ?>

    <div class="outer_container pt-4 px-5"><h1 class="text-center">Produktkort</h1>
      <?PHP
        if (!$product_id_in)
        {
          echo "<h3 class='text-center pb-4'>Lägg till ny produkt</h3>";
          echo"  <div id='response' class='mb-3'></div>";
          include "product_form.php";
        }else{
          echo "<h3 class='text-center pb-4'>Uppdatera produkt</h3>";
          echo"  <div id='response' class='mb-3'></div>";
          $sql = select_one_post("product", "*", "product_id", $product_id_in );
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {while($row = mysqli_fetch_assoc($result)) {include "product_form.php";}}
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
              $('#response').html(\"<div id='response-add' class='bg-success text-white response_hide text-center p-2'>Produkten är sparad.</div>\");
            }
            response();
          });
        </script>";
      }
    ?>
  </body>
</html>
