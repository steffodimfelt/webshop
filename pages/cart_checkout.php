<?PHP
session_start();
include_once "../db_connection.php";
include_once "../functions/prepared_statements.php";
include_once "../functions/print_tables.php";
?>
<!DOCTYPE>
<html>
<head>
  <?PHP include_once "../admin/header.php"; ?>

<?PHP
if ($_SESSION['cart_session_hash']==null){$_SESSION['cart_session_hash'] = password_hash($date, PASSWORD_BCRYPT);}

//Om man inte har något customer_id
if ($_SESSION['customer_id'] >0){}else{$_SESSION['customer_id'] = 0;}



if ( isset( $_POST['Buy'] ) )
{
  $purchased_customer_id = $_POST['purchased_customer_id'];
  $purchased_products = $_POST['purchased_products'];
  $purchased_costs = $_POST['purchased_costs'];
  $purchased_quantity = $_POST['purchased_quantity'];
  $purchased_total_sum = $_POST['purchased_total_sum'];
  $purchased_date = $_POST['purchased_date'];


  $sql_update = $conn->query("INSERT INTO purchased
    SET purchased_customer_id='$purchased_customer_id',purchased_products='$purchased_products',
    purchased_costs='$purchased_costs',purchased_quantity='$purchased_quantity',
    purchased_total_sum='$purchased_total_sum',purchased_date='$purchased_date'");

//delete all from cart
$cart_sql = "SELECT * FROM cart ORDER BY cart_id";
 $cart_tabell = mysqli_query($conn, $cart_sql)
 or die (mysqli_error($conn));
 while($cart_rad = $cart_tabell ->fetch_assoc()){
   $sql_delete = $conn->query("DELETE FROM cart WHERE cart_customer_id=".$purchased_customer_id );
 }

echo '<script>window.location.href = "thank_you.php";</script>';

}


?>

</head>
<body>
<?PHP //include_once "admin_navbar.php"; ?>
  <div class="outer_container pt-4 px-5"><h1 class="text-center">Din varukorg</h1>

<?PHP //echo "cart session hash ".$_SESSION['cart_session_hash'];?>

<?PHP //echo "customer id ".$_SESSION['customer_id']; ?>

<?PHP // echo $cart_hash_date; ?>

<?PHP require "cart_remove_old_products.php"; ?>


<?PHP
 if ($_SESSION['customer_id'] ==0)
 {
   echo "nollkund: ".$_SESSION['customer_id'] ;

   echo "<BR>Du behöver registera dig för att slutföra köpet. ";
   echo "<a href='customer_card.php'>Till registrering</a>";

   echo "<BR>Eller logga in på Mina Sidor ";
   echo "<a href='#'>Till Mina Sidor</a>";


 }else{
   //echo "har kundid: ".$_SESSION['customer_id'] ;

   //Change all orders in cart to new customer_id

  // loopa igenom jämför hash ändra id.
    //ändra id (ifall man vill fortsätta köpa.)
//  echo $_SESSION['cart_session_hash'];
  $cart_session_hash_out = $_SESSION['cart_session_hash'];
  $customer_session_id_out = $_SESSION['customer_id'];
  $total_sum=0;
  $change_customer_id = mysqli_query($conn,"SELECT * FROM cart");

  //Setup strängar för att lägga ihop när man vill avsluta köp
  $purchased_customer_id=0;
  $purchased_products="";
  $purchased_costs="";
  $purchased_quantity="";
  $purchased_date="";
  $date = new DateTime();$date_out = $date->format('Y-m-d H:i:s');

    echo "<table class='table table-hover table-striped'>";
    echo "<tr>
           <th class=''></th>
           <th class='text-left' >Namn</th>
           <th class='text-center'>Färg</th>
           <th class='text-center'>Antal</th>
           <th class='text-right'>Pris</th>
           <th></th>
        </tr>";

   while ($cart_row = mysqli_fetch_assoc($change_customer_id ))
   {
    if ($cart_row['cart_session_hash']==$_SESSION['cart_session_hash'])
    {
      //Välj ut poster som stämmer med hashen
      // skriva ut listan.

        $sql_update = $conn->query("UPDATE cart
        SET cart_customer_id='$customer_session_id_out'
        WHERE cart_session_hash='$cart_session_hash_out'");

        $purchased_customer_id=$customer_session_id_out;

        $products_from_products = mysqli_query($conn,"SELECT * FROM product WHERE product_id=".$cart_row['cart_product_id']);
        while ($products_row=mysqli_fetch_assoc($products_from_products))
        {
          $color_print_out="";
          $color_print= mysqli_query($conn,"SELECT * FROM color WHERE color_id=".$products_row['product_color']);
          while($color_print_row = $color_print ->fetch_assoc()){$color_print_out = $color_print_row['color_name'];}

          $purchased_products=$purchased_products.$products_row['product_name'].",";
          $purchased_costs=$purchased_costs.$products_row['product_cost'].",";
          $purchased_quantity=$purchased_quantity.$cart_row['cart_product_quantity'].",";

          echo "<tr>
                  <td ><img style='width:6rem;' class='img-thumbnail' src='../images/".$products_row['product_image1']."'></td>
                  <td class='text-left'>".$products_row['product_name']."</td>
                  <td class='text-center'>".$color_print_out."</td>
                  <td class=' text-center'>".$cart_row['cart_product_quantity']."</td>
                  <td class=' text-right'>".$products_row['product_cost']."kr</td>
                  <td><a href='product_card.php?product_id=".$rad['product_id']."' class='btn btn-outline-danger'>Ta bort</td>
              </tr>";
          $total_sum = $total_sum + ($products_row['product_cost']*$cart_row['cart_product_quantity']);
        }
    }
   }
$total_sum = number_format($total_sum, 2, '.', '');//formater till två decimaler.
echo "<tr>
       <th colspan='6' class='text-right'>Total summa: ".$total_sum."kr</th>
    </tr>";
echo "</table>";


//Tar bort sista kommatecknet.
$purchased_products = rtrim($purchased_products,",");
$purchased_costs = rtrim($purchased_costs,",");
$purchased_quantity = rtrim($purchased_quantity,",");
 }
?>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >
  <input type="hidden" id="purchased_customer_id" name="purchased_customer_id"  value="<?PHP echo $purchased_customer_id ?>">
  <input type="hidden" id="purchased_products" name="purchased_products"  value="<?PHP echo $purchased_products ?>">
  <input type="hidden" id="purchased_costs" name="purchased_costs"  value="<?PHP echo $purchased_costs ?>">
  <input type="hidden" id="purchased_quantity" name="purchased_quantity"  value="<?PHP echo $purchased_quantity ?>">
  <input type="hidden" id="purchased_total_sum" name="purchased_total_sum"  value="<?PHP echo $total_sum ?>">
  <input type="hidden" id="purchased_date" name="purchased_date"  value="<?PHP echo $date_out ?>">
  <button type='submit' Name = 'Buy'  class='btn btn-success '>Köp nu</button>
</div>
</form>
</div>
<?PHP include_once "footer.php"; ?>
</body>
</html>





<?PHP
/*
$date = date("Y-m-d H:i:s", time() - 3600);// en timme bakåt.


set session timestamp - CHECK
gör om timestamp till bcrypt - CHECK

gör en funktion som rullar igenom Varukorgen
via datumkoll - är varan äldre än aktuell tid - ta bort
borttagen vara läggs tillbaka i rätt produkt - CHECK



jämför noll-kund
checka att kunden har id-nummer
om inte måste man fylla i ett formulär. - CHECK

om kunden inte har id nummer från början.
alla id 0 med session-nummer ändras i varukorgen efter man har registrerat sig.

vid checkout
ta alla produkter som har samma session och id-nummer
lägg ihop i purchesed tillsammans med rätt id.

ta bort alla produkter som är färdiga.

tack för köpet.


Markulera en lagd produkut = ta bort
*/

?>
