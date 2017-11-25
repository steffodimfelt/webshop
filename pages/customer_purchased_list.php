<?PHP require "../admin/include_at_top.php"; ?>
<html>
<head>
  <?PHP include_once "../admin/header.php"; ?>
</head>
<body>
  <div class="outer_container pt-4 px-5"><h1 class="text-center">Mina beställningar</h1>
  <?PHP
      $sql = "SELECT * FROM purchased WHERE purchased_customer_id=".$_SESSION['customer_id'];
             $tabell = mysqli_query($conn, $sql)
             or die (mysqli_error($conn));

             while($rad = $tabell ->fetch_assoc()){
                $purchased_products_split = explode(";", $rad['purchased_products']);
                $purchased_quantity_split = explode(";", $rad['purchased_quantity']);
                $purchased_costs_split = explode(";", $rad['purchased_costs']);
                $producs_count = count($purchased_products_split);


                  echo "<table class='table table-striped my-5'>";
                  echo "<tr>
                         <th colspan='2'>Ordernummer: ".$rad['purchased_id']."</th>
                         <th>Datum: ".$rad['purchased_date']."</th>
                      </tr>";
                  echo " <tr>
                          <th>Artiklar</th>
                          <th>Antal</th>
                          <th>Pris</th>
                         </tr>";

                  for ($splitX=0;$splitX<$producs_count;$splitX++)
                  {
                  echo "<tr>";
                  echo "<td>".$purchased_products_split[$splitX]."</td>
                        <td>".$purchased_quantity_split[$splitX]."st</td>
                        <td>".$purchased_costs_split[$splitX]."kr</td>";
                  echo "</tr>";
                  }
                  echo       "</tr>";

                  echo "<tr><td colspan='2'></td><td><strong>Total summa: ".$rad['purchased_total_sum']."kr</strong></td></tr>";
                  echo  "</table>";
             }
  ?>
  </div>

<?PHP include_once "footer.php"; ?>
</body>
</html>
