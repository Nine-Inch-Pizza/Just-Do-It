<?php

require_once('mysqli_connect.php');

$query = "SELECT category_id, category_name FROM categories";
    
$response = @mysqli_query($dbc, $query);

if($response){
    
    echo '<table align="left"
    cellspacing="5" cellpadding="8">
    
    <tr>
    <td align="left"> <b>ID<b>            </td>
    <td align="left"> <b>Category Name</b>     </td>
    </tr>';
    
    while($row = mysqli_fetch_array($response)){
        
        echo '<tr><td align=left>'  .
            $row['category_id']     .   '</td><td align="left">'    .
            $row['category_name']   .   '</td><td align="left">'    ;
        
        echo '</tr>';
    }
    
    echo '</table>';
    
} else {
    
    echo "Couldn't issue database query";
    
    echo mysqli_error($dbc);
    
}

mysqli_close($dbc);

?>