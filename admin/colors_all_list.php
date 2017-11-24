<?PHP require "include_at_top.php"; ?>
<?PHP
$color_id = $_POST['color_id'];
$color_name = $_POST['color_name'];


if ( isset( $_POST['Add'] ) )
{
    echo "ADD";
  $sql_update = $conn->query("INSERT INTO color SET color_name='$color_name'");


$fetch_latest_post = mysqli_query($conn,"SELECT color_id FROM color ORDER BY color_id DESC LIMIT 1");
    while($latest_post_row = mysqli_fetch_assoc($fetch_latest_post))
    {
      $color_id=$latest_post_row["color_id"];
    }

}
if ( isset( $_POST['Update'] ) )
{
  $sql_update = $conn->query("UPDATE color
    SET
    color_name='$color_name'
    WHERE color_id=$color_id");
}

?>
<html>
<head>
  <?PHP include_once "header.php"; ?>
</head>
<body>
  <?PHP include_once "admin_navbar.php"; ?>
  <div id='response' class='mb-3'></div>
  <div class="outer_container pt-2 px-5"><h1 class="text-center">Färger</h1>
  <?PHP
      $sql = "SELECT * FROM color";
             $tabell = mysqli_query($conn, $sql)
             or die (mysqli_error($conn));
             echo "<table class='table table-hover table-striped'>";
             echo "<tr>
                    <th>Färg</th>
                    <th>Uppdatera</th>
                 </tr>";
             while($rad = $tabell ->fetch_assoc()){
               ?>
                  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                    <tr>
                        <td>
                           <input type="text" id="color_name" name="color_name" class="form-control " value="<?PHP echo $rad["color_name"] ?>">
                           <input type="hidden" id="color_id" name="color_id" class="form-control " value="<?PHP echo $rad["color_id"] ?>">
                       </td>
                       <td><button type='submit' Name = 'Update'  class='btn btn-outline-success'>Uppdatera färg</button></td>
                     </tr>
                      </form>
          <?PHP       }
             echo "</table>";
  ?>
  <h2 class="text-center">Lägg till färg</h2>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
           <input type="text" id="color_name" name="color_name" class="form-control m-3"  >
           <button type='submit' Name = 'Add'  class='btn btn-primary m-3'>Lägg till bild</button>
  </form>

  </div>
<?PHP include_once "footer.php"; ?>
<?PHP
  if (isset($_POST['Add']) || isset($_POST['Update']))
  {
    echo "<script>
      $(function (){
        function response()
        {
          $('#response').html(\"<div id='response-add' class='bg-success text-white response_hide text-center p-2'>Färgen är sparad.</div>\");
        }
        response();
      });
    </script>";
  }
?>

</body>
</html>
