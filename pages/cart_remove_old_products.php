<?PHP
$date_old = date("Y-m-d H:i:s", time() - 3600);// en timme bakåt. i sekunder.
$cart_sql = "SELECT * FROM cart ORDER BY cart_id";
 $cart_tabell = mysqli_query($conn, $cart_sql)
 or die (mysqli_error($conn));
 while($cart_rad = $cart_tabell ->fetch_assoc()){
   if ($cart_rad['cart_date']<$date_old)
   {
     $sql_delete = $conn->query("DELETE FROM cart WHERE cart_id=".$cart_rad['cart_id']);
   }
 }
?>
