<?php

require_once('mysqli_connect.php');

$query = "SELECT task_id, account_id, category_id, task_name, task_date, task_status, task_content, task_img_src FROM tasks";
    
$response = @mysqli_query($dbc, $query);

if($response){
    
    echo '<table align="left"
    cellspacing="5" cellpadding="8">
    
    <tr>
    <td align="left"> <b>Task ID<b>             </td>
    <td align="left"> <b>Account ID</b>         </td>
    <td align="left"> <b>Category ID</b>        </td>
    <td align="left"> <b>Task Name</b>          </td>
    <td align="left"> <b>Task Date</b>          </td>
    <td align="left"> <b>Task Status</b>        </td>
    <td align="left"> <b>Task Content</b>       </td>
    <td align="left"> <b>Task Image Address</b> </td>
    </tr>';
    
    while($row = mysqli_fetch_array($response)){
        
        echo '<tr><td align=left>'                      .
            $row['task_id']                             .   '</td><td align="left">'    .
            $row['account_id']                          .   '</td><td align="left">'    .
            $row['category_id']                         .   '</td><td align="left">'    .
            $row['task_name']                           .   '</td><td align="left">'    .
            $row['task_date']                           .   '</td><td align="left">'    .
            $row['task_status']                         .   '</td><td align="left">'    .
            $row['task_content']                        .   '</td><td align="left">'    .
            $row['task_img_src']                        .   '</td><td align="left">'    .
            '<button type="button">Click Me!</button>'  .   '</td><td align="left">'    ;
        
        echo '</tr>
        
        ';
    }
    
    echo '</table>';
    
} else {
    
    echo "Couldn't issue database query";
    
    echo mysqli_error($dbc);
    
}

mysqli_close($dbc);

?>