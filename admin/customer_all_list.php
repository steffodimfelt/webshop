<?PHP require "include_at_top.php"; ?>
<html>
<head>
  <?PHP include_once "header.php"; ?>
</head>
<body>
  <?PHP include_once "admin_navbar.php"; ?>
  <div class="outer_container pt-4 px-5"><h1 class="text-center">Kunder</h1></div>
  <?PHP
      $sql = "SELECT * FROM customer";
             $tabell = mysqli_query($conn, $sql)
             or die (mysqli_error($conn));
             echo "<table class='table table-hover table-striped'>";
             echo "<tr>
                    <th>Kundnummer</th>
                    <th>Förnamn</th>
                    <th>Efternamn</th>
                    <th>Epost</th>
                    <th>Adress</th>
                    <th>Postnummer</th>
                    <th>Stad</th>
                    <th>Ändra</th>
                 </tr>";
             while($rad = $tabell ->fetch_assoc()){
                 echo "<tr>
                         <td>".$rad['customer_id']."</td>
                         <td>".$rad['customer_firstname']."</td>
                         <td>".$rad['customer_lastname']."</td>
                         <td>".$rad['customer_email']."</td>
                         <td>".$rad['customer_address']."</td>
                         <td>".$rad['customer_zip']."</td>
                         <td>".$rad['customer_city']."</td>
                         <td><a href='customer_card.php?customer_id=".$rad['customer_id']."' class='btn btn-outline-danger'>Ändra</td>
                     </tr>";
             }
             echo "</table>";
  ?>

<?PHP include_once "footer.php"; ?>
</body>
</html>
