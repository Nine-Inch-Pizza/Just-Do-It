<?php
	function addTask($t_account, $t_category, $t_name, $t_date, $t_status, $t_content, $t_image) {
		require_once('mysqli_connect.php');
                
        $query = "INSERT INTO tasks(task_id, account_id, category_id, task_name, task_date, task_status, task_content, task_img_src) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";
                
        $stmt = mysqli_prepare($dbc, $query);
                
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
        
        mysqli_stmt_bind_param($stmt, "iississ", $t_account, $t_category, $t_name, $t_date, $t_status, $t_content, $t_image);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Task Entered';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occured<br />';
            echo mysqli_error($dbc);
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
                
        }
	}
?>