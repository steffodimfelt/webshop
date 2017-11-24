<?PHP require "include_at_top.php"; ?>
<html>
<head>
  <?PHP include_once "header.php"; ?>
</head>
<body>
  <?PHP include_once "admin_navbar.php"; ?>
  <div class="outer_container pt-4 px-5"><h1 class="text-center">Admin</h1></div>
  <?PHP
      $sql = "SELECT * FROM admin";
             $tabell = mysqli_query($conn, $sql)
             or die (mysqli_error($conn));
             echo "<table class='table table-hover table-striped'>";
             echo "<tr>
                    <th>Admin ID</th>
                    <th>Namn</th>
                    <th>Epost</th>
                
                 </tr>";
             while($rad = $tabell ->fetch_assoc()){
                 echo "<tr>
                         <td>".$rad['admin_id']."</td>
                         <td>".$rad['admin_name']."</td>
                         <td>".$rad['admin_email']."</td>

                     </tr>";
             }
             echo "</table>";
  ?>

<?PHP include_once "footer.php"; ?>
</body>
</html>
