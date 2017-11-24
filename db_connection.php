
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "smell_the_coffee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*
function select_one_post($table_in, $select_in, $where_name, $where_value)
{
  return  $query_out="SELECT $select_in FROM $table_in WHERE  $where_name = $where_value";
}

$sql = select_one_post("customer", "customer_id, customer_firstname, customer_lastname", "customer_id", 2);
//$sql = "SELECT customer_id, customer_firstname, customer_lastname FROM customer WHERE customer_id = 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["customer_id"]. " - Name: " . $row["customer_firstname"]. " " . $row["customer_lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
*/
?>
