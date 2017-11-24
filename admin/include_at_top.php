<?PHP
session_start();
if (!isset($_SESSION['admin_id'])){echo '<script>window.location.href = "index.php";</script>';}
include_once "../db_connection.php";
include_once "../functions/prepared_statements.php";
include_once "../functions/print_tables.php";
?>
<!DOCTYPE>
