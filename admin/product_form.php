<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

  <?php
  if ($product_id_in){
      echo "<div class='form-group'>";
      echo "<label for='product_id' class='col-form-label'>Artikelnummer:</label>";
      echo " ".$row["product_id"];
      echo "<input type='hidden' readonly id='product_id' name='product_id' value='".$row["product_id"]."'>";
      echo "</div>";
  }
  ?>

  <div class="form-group d-flex flex-column  flex-md-row">
    <div class="m-2 d-flex flex-column ">
      <label for="product_image1">Bild 1:</label>
      <?php if (!$product_id_in){
        echo "<img class ='img-thumbnail' style='max-width:15rem;' src='../images/blank_mugg.png'>";
      }else{
        echo "<img class ='img-thumbnail' style='max-width:15rem;' src='../images/".$row['product_image1']."'>";
      }
      ?>
      <button type='submit' Name = 'GetImg1'  class='btn btn-primary mt-2' style='max-width:15rem;'>Hämta annan bild 1</button>
    </div>
    <div class="m-2 d-flex flex-column">
      <label for="product_image2">Bild 2:</label>

      <?php if (!$product_id_in){
        echo "<img class ='img-thumbnail' style='max-width:15rem;' src='../images/blank_mugg.png'>";
      }else{
        echo "<img class ='img-thumbnail' style='max-width:15rem;' src='../images/".$row['product_image2']."'>";
      }
      ?>
      <button type='submit' Name = 'GetImg2'  class='btn btn-primary mt-2' style='max-width:15rem;'>Hämta annan bild 2</button>
    </div>
    <div class="m-2 d-flex flex-column">
      <label for="product_image3">Bild 3:</label>

      <?php if (!$product_id_in){
        echo "<img class ='img-thumbnail' style='max-width:15rem;' src='../images/blank_mugg.png'>";
      }else{
        echo "<iframe class ='img-thumbnail' src='".$row['product_image3']."' frameborder='0' allowvr allowfullscreen mozallowfullscreen='true' webkitallowfullscreen='true' onmousewheel=''></iframe>";
      }?>

      <input type="text" id="product_image3" name="product_image3" class="form-control mt-2" value="<?PHP echo $row["product_image3"] ?>">
      <small id="product_image3" class="form-text text-muted">Klistra in URL för iframe till 3D-modellen.<BR>URL:en ser ut så här: https://sketchfab.com/models/xxx/embed</small>
    </div>
  </div>

  <div class="form-group">
    <label for="product_name">Produktnamn:</label>
    <input type="text" id="product_name" name="product_name" class="form-control" value="<?PHP echo $row["product_name"] ?>">
  </div>

  <div class="form-group">
    <label for="product_description">Beskrivning:</label>
    <textarea id="product_description" name="product_description" class="form-control"  rows="3" ><?PHP echo $row["product_description"] ?></textarea>
  </div>

  <div class="form-group">
    <label for="product_description">Färg:</label>
    <select id="color_name" name="product_color" class="custom-select mb-2 mr-sm-2 mb-sm-0" >
      <option selected>Välj färg</option>
      <?php //Get a list of colors
        $color_sql =  select_table_order_by("color", "*", "color_id");
        $result_color = mysqli_query($conn, $color_sql);
        if (mysqli_num_rows($result_color) > 0) {
          while($row_color = mysqli_fetch_assoc($result_color)) {
            if ($row_color['color_id']==$row["product_color"])
            {
              echo "<option selected value=".$row_color['color_id'].">".$row_color['color_name']."</option>";
            }else{
              echo "<option value=".$row_color['color_id'].">".$row_color['color_name']."</option>";
            }
            echo $row_color['color_id'];
            echo $product_color;
        }
      }
    ?>
  </select>
</div>

<div class="form-group">
  <label for="product_cost">Pris (kr):</label>
  <input type="text" id="product_cost"  name="product_cost"  class="form-control " placeholder="<?PHP echo $row["product_cost"] ?>" value="<?PHP echo $row["product_cost"] ?>">
  <small id="product_tag" class="form-text text-muted">Ören separeras med en punkt.</small>
</div>

<div class="form-group">
 <label for="product_quantity">Antal:</label>
 <input type="text" id="product_quantity" name="product_quantity" class="form-control "  placeholder="<?PHP echo $row["product_quantity"] ?>" value="<?PHP echo $row["product_quantity"] ?>">
</div>

<div class="form-group">
 <label for="product_tag">Taggar:</label>
 <input type="text" id="product_tag" name="product_tag" class="form-control "  placeholder="<?PHP echo $row["product_tag"] ?>" value="<?PHP echo $row["product_tag"] ?>">
 <small id="passwordHelpBlock" class="form-text text-muted">Taggarna separeras med kommatecken.</small>
</div>
  <?php if (!$product_id_in){echo "<button type='submit' Name = 'Add'  class='btn btn-primary'>Lägg till</button>";}else{echo " <button type='submit' Name = 'Update'  class='btn btn-primary'>Uppdatera</button>";}?>

</form>
