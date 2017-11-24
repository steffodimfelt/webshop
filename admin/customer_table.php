<?PHP require "include_at_top.php"; ?>
<?PHP
$customer_id_in = $_GET["customer_id"];

?>
<html>
<head>
  <?PHP include_once "header.php"; ?>

</head>
<body>

<?php
$field_select = "customer_id, customer_firstname, customer_lastname";
$sql = select_one_post("customer", $field_select, "customer_id", 2);
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["customer_id"]. " - Name: " . $row["customer_firstname"]. " " . $row["customer_lastname"]. "<br>";
    }
} else {
    echo "0 results";
}


 ?>



<?PHP $conn->close();?>
</body>
</html>
