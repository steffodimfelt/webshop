<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

  <?php
  if ($customer_id_in){
      echo "<div class='form-group'>";
      echo "<label for='customer_id' class='col-form-label'>Kundnummer:</label>";
      echo " ".$row["customer_id"];
      echo "<input type='hidden' readonly id='customer_id' name='customer_id'  value=' ".$row["customer_id"]."'>";
      echo "</div>";
  }
  ?>

  <div class="form-group">
    <label for="customer_firstname">Förnamn:</label>
    <input type="text" id="customer_firstname" name="customer_firstname" class="form-control " placeholder="<?PHP echo $row["customer_firstname"] ?>" value="<?PHP echo $row["customer_firstname"] ?>">
  </div>

  <div class="form-group">
    <label for="customer_lastname">Efternamn:</label>
    <input type="text" id="customer_lastname" name="customer_lastname" class="form-control " placeholder="<?PHP echo $row["customer_lastname"] ?>" value="<?PHP echo $row["customer_lastname"] ?>">
  </div>

  <div class="form-group">
    <label for="customer_email">Epost:</label>

    <?php if (!$customer_id_in){ ?>
      <input type="email" id="customer_email" name="customer_email" class="form-control " placeholder="<?PHP echo $row["customer_email"] ?>" value="<?PHP echo $row["customer_email"] ?>">
      <?PHP
      }else{
      echo "Eposten kan inte ändras av admin. Kunden får ändra själv i \"Mina Sidor\".";
    }?>
  </div>

  <div class="form-group">
    <label for="customer_password">Lösenord:</label>
    <?php if (!$customer_id_in){ ?>
      <input type="text" id="customer_password" name="customer_password" class="form-control " placeholder="<?PHP echo $row["customer_password"] ?>" value="<?PHP echo $row["customer_password"] ?>">
      <?PHP
      }else{
      echo "Lösenord lämnas inte ut. Kan endast hämtas av kund via \"Glömt lösenord\" på första sidan.";
    }?>
  </div>

  <div class="form-group">
    <label for="customer_address">Adress:</label>
    <input type="text" id="customer_address" name="customer_address" class="form-control " placeholder="<?PHP echo $row["customer_address"] ?>" value="<?PHP echo $row["customer_address"] ?>">
  </div>

  <div class="form-group">
    <label for="customer_zip">Postnummer:</label>
    <input type="text" id="customer_zip" name="customer_zip" class="form-control " placeholder="<?PHP echo $row["customer_zip"] ?>" value="<?PHP echo $row["customer_zip"] ?>">
  </div>

  <div class="form-group">
    <label for="customer_city">Stad:</label>
    <input type="text" id="customer_city" name="customer_city" class="form-control " placeholder="<?PHP echo $row["customer_city"] ?>" value="<?PHP echo $row["customer_city"] ?>">
  </div>

  <div class="form-group">
      <label for="customer_latest_login">Senast inloggad:</label>
    <?php if (!$customer_id_in){
      $date = new DateTime();$date_out = $date->format('Y-m-d H:i:s'); $date_print_out = $date->format('Y-m-d'); echo $date_print_out;
      echo "<input type='hidden' id='customer_latest_login' name='customer_latest_login' class='form-control' value=' $date_out '>";
    }else{
      echo $row["customer_latest_login"];
      echo "<input type='hidden' id='customer_latest_login' name='customer_latest_login' class='form-control' value=' ".$row["customer_latest_login"]." '>";
    }?>
  </div>


  <?php if (!$customer_id_in){echo "<button type='submit' Name = 'Add'  class='btn btn-primary'>Lägg till</button>";}else{echo " <button type='submit' Name = 'Update'  class='btn btn-primary'>Uppdatera</button>";}?>

</form>
