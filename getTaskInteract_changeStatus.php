
<?php

if(isset($_POST['sub'])){
            
            $data_missing = array();
    
            if(empty($_POST['task_id'])){
                $data_missing[] = "Category";
            } else{
                $t_id = trim($_POST['task_id']);
            }
    
            if(empty($_POST['task_status'])){
                $data_missing[] = "Category";
            } else{ 
                $t_status = $_POST['task_status']; 
            }
    
    if(empty($data_missing)){
                echo $t_status;
                switch($t_status) {
                    case "Complete" :   $new_status = "Doing"; break;
                    case "Doing" :      $new_status = "Complete"; break;
                    default:            $new_status = "Complete";
                }
                require_once('mysqli_connect.php');
                
                $query = "UPDATE tasks SET task_status=? WHERE task_id=?";
                $stmt = mysqli_prepare($dbc, $query);
                
                //i Integers
                //d Doubles
                //b Blobs
                //s Everything Else
                
                mysqli_stmt_bind_param($stmt, "si", $new_status, $t_id);
                
                mysqli_stmt_execute($stmt);
                    
                    echo 'Task Completed';
                    
                    mysqli_stmt_close($stmt);
                    
                    mysqli_close($dbc);
                    
                    header("getTaskInteract.php");
                    exit();
                    

    }
}
?>