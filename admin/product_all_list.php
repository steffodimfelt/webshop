<?PHP require "include_at_top.php"; ?>
<html>
<head>
  <?PHP include_once "header.php"; ?>
</head>
<body>
  <?PHP include_once "admin_navbar.php"; ?>
  <div class="outer_container pt-4 px-5"><h1 class="text-center">Produkter</h1></div>
  <?PHP
      $sql = "SELECT * FROM product";
             $tabell = mysqli_query($conn, $sql)
             or die (mysqli_error($conn));
             echo "<table class='table table-hover table-striped'>";
             echo "<tr>
                    <th>Art.nr</th>
                    <th>Namn</th>
                    <th>Beskrivning</th>
                    <th>Pris</th>
                    <th>Antal</th>
                    <th>Färg</th>
                    <th>Taggar</th>
                    <th>Ändra</th>
                 </tr>";
             while($rad = $tabell ->fetch_assoc()){

                 echo "<tr>
                         <td>".$rad['product_id']."</td>
                         <td>".$rad['product_name']."</td>
                         <td>".$rad['product_description']."</td>
                         <td>".$rad['product_cost']."kr</td>
                         <td>".$rad['product_quantity']."st</td>";


                         $color_sql =  select_one_post("color", "*", "color_id", $rad['product_color']);
                         $result_color = mysqli_query($conn, $color_sql);
                           while($row_color = mysqli_fetch_assoc($result_color))
                           {
                             echo  "<td>".$row_color['color_name']."</td>";
                           }




                  echo  "<td>".$rad['product_tag']."</td>

                         <td><a href='product_card.php?product_id=".$rad['product_id']."' class='btn btn-outline-danger'>Ändra</td>
                     </tr>";
             }
             echo "</table>";
  ?>

<?PHP include_once "footer.php"; ?>
</body>
</html>
