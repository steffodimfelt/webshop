<?PHP
include_once "../db_connection.php";
include_once "../functions/prepared_statements.php";
include_once "../functions/print_tables.php";

$date_old = date("Y-m-d H:i:s", time() - 3600);// en timme bakåt. i sekunder.
$cart_sql = "SELECT * FROM cart ORDER BY cart_id";
 $cart_tabell = mysqli_query($conn, $cart_sql)
 or die (mysqli_error($conn));
 while($cart_rad = $cart_tabell ->fetch_assoc()){
   if ($cart_rad['cart_date']<$date_old)
   {
     //hämta värde från product
     $product_old_sql = "SELECT * FROM product WHERE product_id=".$cart_rad['cart_product_id'];
     $cart_old_tabell = mysqli_query($conn, $product_old_sql);

     //lägg tillbaka cart+product i product och vaskad cart
     while($product_old_row = $cart_old_tabell ->fetch_assoc()){
       $product_quantity_old=0;
       $product_quantity_old=$product_old_row ['product_quantity']+$cart_rad['cart_product_quantity'];

        $back_to_product = $conn->query("UPDATE product
         SET product_quantity=$product_quantity_old
         WHERE product_id=".$cart_rad['cart_product_id']);
     }
     //radera post från cart.
     $sql_delete = $conn->query("DELETE FROM cart WHERE cart_id=".$cart_rad['cart_id']);
   }
 }
?>
