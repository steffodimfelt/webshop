<?PHP require "include_at_top.php"; ?>
<html>
<head>
  <?PHP include_once "header.php"; ?>

<?PHP
  $color_row= $_GET['color_row'];
  $product_id=$_GET['product_id'];

  $only_img_name=$_POST['only_img_name'];

  if ( isset( $_POST['Update'] ) )
  {
    $only_img_name=$_POST['only_img_name'];

    $color_row=$_POST['color_row_out'];
    $product_id=$_POST['product_id_out'];

    if ($color_row==1)
    {
      $sql_update = $conn->query("UPDATE product
        SET
        product_image1='$only_img_name'
        WHERE product_id='$product_id'");
    echo "<script>window.location.href = 'product_card.php?product_id=$product_id';</script>";
    }
    if ($color_row==2)
    {
      $sql_update = $conn->query("UPDATE product
        SET
        product_image2='$only_img_name'
        WHERE product_id='$product_id'");
    echo "<script>window.location.href = 'product_card.php?product_id=$product_id';</script>";
    }

  }

?>


</head>
<body>
<?PHP include_once "admin_navbar.php";?>

<!-- Navgeringsdel -->
<div class="outer_container pt-4 px-5"><h1 class="text-center">Bildbank</h1>


  <div class="d-flex flex-column flex-sm-row ">
  <?PHP
  $all_files = glob("../images/*.*");
   for ($i=0; $i<count($all_files); $i++)
     {
       $image_name = $all_files[$i];
       $supported_format = array('gif','jpg','jpeg','png');
       $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

       if (in_array($ext, $supported_format))
           {
             $only_img_name = str_replace('../images/', '', $image_name);
             ?>
             <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
               <button type='submit' Name = 'Update'  class='btn btn-primary img-thumbnail m-2 p-1'>
               <img src='<?PHP echo $image_name ?>' class='rounded img-fluid'> </button>
               <input type="hidden" id="only_img_name" name="only_img_name"  value="<?PHP echo $only_img_name ?>">
               <input type="hidden" id="color_row_out" name="color_row_out"  value="<?PHP echo $color_row ?>">
               <input type="hidden" id="product_id_out" name="product_id_out"  value="<?PHP echo $product_id ?>">
               </form>
             <?PHP
           } else {
               continue;
           }
     }
  ?>
  </div>



</div>
<?PHP include_once "footer.php"; ?>
</body>
</html>
