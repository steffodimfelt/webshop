<?PHP
  function select_table_order_by($table_in, $select_in, $order_in)
  {
    return  $query_out="SELECT $select_in FROM $table_in ORDER BY $order_in";
  }

  function select_table($table_in, $select_in)
  {
    return  $query_out="SELECT $select_in FROM $table_in";
  }

  function select_one_post($table_in, $select_in, $where_name, $where_value)
  {
    return  $query_out="SELECT $select_in FROM $table_in WHERE  $where_name = $where_value";
  }

?>
