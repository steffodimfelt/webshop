<?PHP require "include_at_top.php"; ?>
<html>
<head>
  <?PHP include_once "header.php"; ?>
  <?php

  if (isset($_POST['Delete']))
  {
    $purchased_id= $_POST['purchased_id'];
    $sql_delete = $conn->query("DELETE FROM purchased WHERE purchased_id=".$purchased_id);
  }

   ?>
</head>
<body>
  <?PHP include_once "admin_navbar.php"; ?>
  <div class="outer_container pt-4 px-5"><h1 class="text-center">Lagda ordrar</h1></div>
  <?PHP
      $sql = "SELECT * FROM purchased ORDER BY purchased_id DESC";
             $tabell = mysqli_query($conn, $sql)
             or die (mysqli_error($conn));
             echo "<table class='table table-hover table-striped'>";
             echo "<tr>
                    <th>Ordernummer</th>
                    <th>Kundnummer</th>
                    <th>Artiklar</th>
                    <th>Antal</th>
                    <th>Pris</th>
                    <th>Total summa</th>
                    <th>Datum</th>

                 </tr>";
             while($rad = $tabell ->fetch_assoc()){
                 echo "<tr>
                         <td>".$rad['purchased_id']."</td>
                         <td>".$rad['purchased_customer_id']."</td>
                         <td>".$rad['purchased_products']."</td>
                         <td>".$rad['purchased_quantity']."</td>
                         <td>".$rad['purchased_costs']."</td>
                         <td>".$rad['purchased_total_sum']."kr</td>
                         <td>".$rad['purchased_date']."</td>
                         </tr>";
             }
             echo "</table>";
  ?>

<?PHP include_once "footer.php"; ?>
</body>
</html>
