<?PHP
  $error_no_table ="Det är något fel med tabellen.";

//Listar valda kolumner med vald sortering
function print_table_order_by($conn_in,$table_select,$order_in,$column_array,$outer_div,$inner_div,$outer_link)
{
  $outer_link_out="";
  $compound_out="";
  if ($outer_link!==""){$outer_link_out = explode("?", $outer_link);$compound_out=$outer_link_out[1];array_unshift($column_array, $outer_link_out[1]);}//If there is an link at $outer_link

  foreach ($column_array as $column_array_comp_key => $column_array_comp_value) {$compound_out = $compound_out.",".$column_array_comp_value;}
  if ($outer_link==""){$compound_out = substr($compound_out, 1);}//Remove first letter i.e. ","
  if ($result=mysqli_query($conn_in,select_table_order_by($table_select,$compound_out,$order_in)))
    {
    while ($obj=mysqli_fetch_object($result))
      {
        foreach ($column_array as $column_array_key => $column_array_value)
        {
          $print_value = eval('return $obj->'. $column_array_value . ';');
          if ($outer_link!=="")
          {
            $column_array_key==0?  print "<a href='$outer_link_out[0]?$outer_link_out[1]=$print_value'><div class='$outer_div'>":print "<div class='$inner_div'>$print_value</div>";
          }else{
            $column_array_key==0?print "<div class='$outer_div'><div class='$inner_div'>$print_value</div>":print "<div class='$inner_div'>$print_value</div>";
          }
          if ($column_array_key==sizeof($column_array)-1){$outer_link!==""?print "</div></a>":print "</div>";}
        }
      }
    mysqli_free_result($result);
  }else{
    echo $error_no_table;
  }
}

function print_one_post($conn_in,$table_select,$select_in,$where_name,$where_value)
{
 //OBS EJ FULLSTÄNDIG!
   //PRINT CHOOSED COLOR
   $temp_color = $row["product_color"];
    $color_print =  "SELECT * FROM color WHERE  color_id =$temp_color ";
    $result_color_print = mysqli_query($conn, $color_print);
    if (mysqli_num_rows($result_color_print) > 0)
    {
      while($row_color_print = mysqli_fetch_assoc($result_color_print))
      {echo $row_color_print["color_name"];}
     } else {
        echo "Ingen färg vald";
     }

}


?>
