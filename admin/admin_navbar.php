<nav class="navbar navbar-toggleable-sm bg-primary navbar-inverse">
  <div class="outer_container menu_over">
    <div class="text-center">
      <a class="navbar-brand " href="overview.php">STC Admin</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
      <span >&#9776;</span>
    </button>
    </div>
    <div class="collapse navbar-collapse" id="mainNav">
      <div class="navbar-nav">
        <ul class="navbar-nav mr-auto">

          <li class="nav-item ">
            <span class="glyphicon glyphicon-asterisk"></span>
            <a class="nav-link text-warning" href="my_admin_card.php" id="logout" role="button" aria-expanded="false">Min Admin</a>
          </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="kunder_drop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kunder
          </a>
          <div class="dropdown-menu" aria-labelledby="kunder_drop">
            <a class="dropdown-item" href="customer_all_list.php">Uppdatera kunder</a>
            <a class="dropdown-item" href="customer_card.php">Lägg till kund</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="produkter_drop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Produkter
          </a>
          <div class="dropdown-menu" aria-labelledby="produkter_drop">
            <a class="dropdown-item" href="product_all_list.php">Uppdatera produkter</a>
            <a class="dropdown-item" href="product_card.php">Lägg till produkt</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="kunder_drop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Admin
          </a>
          <div class="dropdown-menu" aria-labelledby="kunder_drop">
            <a class="dropdown-item" href="admin_all_list.php">Lista alla admin</a>
            <a class="dropdown-item" href="admin_card.php">Lägg till admin</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="order_drop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Orderhantering
          </a>
          <div class="dropdown-menu" aria-labelledby="order_drop">
            <a class="dropdown-item" href="cart_all_list.php">Lista varukorg</a>
            <a class="dropdown-item" href="purchased_all_list.php">Lista lagda ordrar</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="bild_drop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Övrig hantering
          </a>
          <div class="dropdown-menu" aria-labelledby="bild_drop">
              <a class="dropdown-item" href="colors_all_list.php">Hantera produktfärger</a>
          </div>
        </li>

        <li class="nav-item ">
          <a class="nav-link text-white " href="logout.php" id="logout" role="button"  aria-expanded="false">Logout</a>
        </li>

      </ul>
      </div>
    </div>
  </div>
</nav>
