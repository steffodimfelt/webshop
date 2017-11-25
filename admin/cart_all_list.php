<?PHP require "include_at_top.php"; ?>
<html>
<head>
  <?PHP include_once "header.php"; ?>
  <?php

  if (isset($_POST['Delete']))
  {
    $cart_id= $_POST['cart_id'];
    $sql_delete = $conn->query("DELETE FROM cart WHERE cart_id=".$cart_id);
  }

   ?>
</head>
<body>
  <?PHP include_once "admin_navbar.php"; ?>
  <div class="outer_container pt-4 px-5"><h1 class="text-center">Varukorgen</h1>
<div id='response' class='mb-3'></div>
  </div>
  <?PHP
      $sql = "SELECT * FROM cart ORDER BY cart_id DESC";
             $tabell = mysqli_query($conn, $sql)
             or die (mysqli_error($conn));
             echo "<table class='table table-hover table-striped'>";
             echo "<tr>
                    <th>Beställningsnummer</th>
                    <th>Kundnummer</th>
                    <th>Artikelnummer</th>
                    <th>Antal</th>
                    <th>Datum</th>
                    <th>Ändra</th>
                 </tr>";
             while($rad = $tabell ->fetch_assoc()){
                 echo "<tr>
                         <td>".$rad['cart_id']."</td>
                         <td>".$rad['cart_customer_id']."</td>
                         <td>".$rad['cart_product_id']."</td>
                         <td>".$rad['cart_product_quantity']."</td>
                         <td>".$rad['cart_date']."</td>"; ?>

                         <td>
                         <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                           <input type='hidden' id='cart_id' name='cart_id' value="<?php echo $rad['cart_id']; ?>">
                           <button type='submit' Name = 'Delete'  class='btn btn-danger '>Ta bort</button>
                         </form>
                         </td>

              <?PHP echo "</tr>";
             }
             echo "</table>";
  ?>

<?PHP include_once "footer.php"; ?>

<?php
if (isset($_POST['Delete']))
{
  echo "<script>
    $(function (){
      $('#response').html(\"<div id='response-add' class='bg-warning text-white response_hide text-center p-2'>Artikeln är borttagen.</div>\");
    });
  </script>";
}

 ?>

</body>
</html>
