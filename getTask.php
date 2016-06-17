<?php 
    session_start();
?>

<?php

require_once('mysqli_connect.php');
require_once('sqlNames.php');

$query = "SELECT $TASK_ID, T.$ACCOUNT_ID, $CATEGORY_NAME, $TASK_NAME, $TASK_STATUS, $TASK_STATUS, $TASK_CONTENT, $TASK_IMG_SRC, $TASK_DATE FROM $TASK_TABLE T, $CATEGORY_TABLE C WHERE T.$CATEGORY_ID = C.$CATEGORY_ID";
    
$response = @mysqli_query($dbc, $query);

if($response){
    
    echo '<table align="left"
    cellspacing="5" cellpadding="8">
    
    <tr>
    <td align="left"> <b>Task ID<b>             </td>
    <td align="left"> <b>Account ID</b>         </td>
    <td align="left"> <b>Category</b>        </td>
    <td align="left"> <b>Task Name</b>          </td>
    <td align="left"> <b>Task Date</b>          </td>
    <td align="left"> <b>Task Status</b>        </td>
    <td align="left"> <b>Task Content</b>       </td>
    <td align="left"> <b>Task Image Address</b> </td>
    </tr>';
    
    while($row = mysqli_fetch_array($response)){
        
        echo '<tr><td align=left>'  .
            $row[$TASK_ID]         .   '</td><td align="left">'    .
            $row[$ACCOUNT_ID]      .   '</td><td align="left">'    .
            $row[$CATEGORY_NAME]   .   '</td><td align="left">'    .
            $row[$TASK_NAME]       .   '</td><td align="left">'    .
            $row[$TASK_DATE]       .   '</td><td align="left">'    .
            $row[$TASK_STATUS]     .   '</td><td align="left">'    .
            $row[$TASK_CONTENT]    .   '</td><td align="left">'    .
            $row[$TASK_IMG_SRC]    .   '</td><td align="left">'    ;
        
        echo '</tr>';
    }
    
    echo '</table>';
    
} else {
    
    echo "Couldn't issue database query";
    
    echo mysqli_error($dbc);
    
}

mysqli_close($dbc);

?>