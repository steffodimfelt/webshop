<?PHP require "include_at_top.php"; ?>
<?PHP
if (!isset($_SESSION['admin_id']))
{
header("location:index.php");
}
include_once "../db_connection.php";
include_once "../functions/prepared_statements.php";
include_once "../functions/print_tables.php";
?>
<html>
<head>
  <?PHP include_once "header.php"; ?>
</head>
<body>
<?PHP include_once "admin_navbar.php";


?>

<!-- Navgeringsdel -->
<div class="outer_container pt-4 px-5"><h1 class="text-center">Översikt</h1>
<h3 class='text-center pb-4'>Hej <?PHP echo $_SESSION['admin_name'] ?>! <BR>Välkommen!</h3>
</div>
  <div id="stc_container" class="d-flex justify-content-center  flex-column flex-md-row ">

    <div class="card m-2 bg-primary text-white ">
      <h4 class="card-title px-3 pt-2 ">Kunder</h4>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a class="card-link" href="customer_all_list.php">Uppdatera kunder</a></li>
        <li class="list-group-item"><a class="card-link" href="customer_card.php">Lägg till kund</a></li>
      </ul>
    </div>

    <div class="card m-2 bg-primary text-white">
      <h4 class="card-title px-3 pt-2">Produkter</h4>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a class="card-link" href="product_all_list.php">Uppdatera produkter</a></li>
        <li class="list-group-item"><a class="card-link" href="product_card.php">Lägg till produkt</a></li>
      </ul>
    </div>

    <div class="card m-2 bg-primary text-white">
      <h4 class="card-title px-3 pt-2">Admin</h4>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><a class="card-link" href="admin_all_list.php">Uppdatera admin</a></li>
        <li class="list-group-item"><a class="card-link" href="admin_card.php">Lägg till admin</a></li>
      </ul>
    </div>

    <div class="card m-2 bg-primary text-white">
      <h4 class="card-title px-3 pt-2">Orderhantering</h4>
      <ul class="list-group list-group-flush">
          <li class="list-group-item"><a class="card-link" href="cart_all_list.php">Lista varukorg</a></li>
          <li class="list-group-item"><a class="card-link" href="purchased_all_list.php">Lista lagda ordrar</a></li>
      </ul>
    </div>

    <div class="card m-2 bg-primary text-white">
      <h4 class="card-title px-3 pt-2">Övrig hantering</h4>
      <ul class="list-group list-group-flush">
          <li class="list-group-item"><a class="card-link" href="">Lägg till bild</a></li>
          <li class="list-group-item"><a class="card-link" href="colors_all_list.php">Hantera produktfärger</a></li>
      </ul>
    </div>

<?PHP include_once "footer.php"; ?>
</body>
</html>
