<?PHP require "include_at_top.php"; ?>
<html>
<head>
  <?PHP include_once "header.php"; ?>
</head>
<body>
  <?PHP include_once "admin_navbar.php"; ?>
  <div class="outer_container pt-4 px-5"><h1 class="text-center">Varukorgen</h1></div>
  <?PHP
      $sql = "SELECT * FROM cart ORDER BY cart_id DESC";
             $tabell = mysqli_query($conn, $sql)
             or die (mysqli_error($conn));
             echo "<table class='table table-hover table-striped'>";
             echo "<tr>
                    <th>Ordernummer</th>
                    <th>Kundnummer</th>
                    <th>Artikelnummer</th>
                    <th>Antal</th>
                    <th>Datum</th>
                    <th>Hash (endast för test)</th>
                    <th>Markulerad</th>
                    <th>Ändra</th>
                 </tr>";
             while($rad = $tabell ->fetch_assoc()){
                 echo "<tr>
                         <td>".$rad['cart_id']."</td>
                         <td>".$rad['cart_customer_id']."</td>
                         <td>".$rad['cart_product_id']."</td>
                         <td>".$rad['cart_product_quantity']."</td>
                         <td>".$rad['cart_date']."</td>
                         <td>".$rad['cart_session_hash']."</td>
                         <td>".$rad['cart_cancel']."</td>
                         <td><a href='customer_card.php?customer_id=".$rad['customer_id']."' class='btn btn-outline-danger'>Markulera</td>
                     </tr>";
             }
             echo "</table>";
  ?>

<?PHP include_once "footer.php"; ?>
</body>
</html>
