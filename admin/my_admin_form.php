<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

  <?php
  if ($admin_id_in){
      echo "<div class='form-group'>";
      echo "<label for='admin_id' class='col-form-label'>Adminnummer:</label>";
      echo " ".$row["admin_id"];
      echo "<input type='hidden' readonly id='admin_id' name='admin_id'  value=' ".$row["admin_id"]."'>";
      echo "</div>";
  }
  ?>

  <div class="form-group">
    <label for="admin_name">Namn:</label>
    <input type="text" id="admin_name" name="admin_name" class="form-control " placeholder="<?PHP echo $row["admin_name"] ?>" value="<?PHP echo $row["admin_name"] ?>">
  </div>

  <div class="form-group">
    <label for="admin_email">Epost:</label>
    <input type="email" id="admin_email" name="admin_email" class="form-control " placeholder="<?PHP echo $row["admin_email"] ?>" value="<?PHP echo $row["admin_email"] ?>">
  </div>

  <div class="form-group">
    <label for="admin_password">Lösenord:</label>
    <input type="password" id="admin_password" name="admin_password" class="form-control " placeholder="<?PHP echo $row["admin_password"] ?>" value="<?PHP echo $row["admin_password"] ?>">
  </div>

  <?php if (!$admin_id_in){echo "<button type='submit' Name = 'Add'  class='btn btn-primary'>Lägg till</button>";}else{echo " <button type='submit' Name = 'Update'  class='btn btn-primary'>Uppdatera</button>";}?>

</form>
