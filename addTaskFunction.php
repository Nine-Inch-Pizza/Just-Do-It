<?php
	function addTask($t_account, $t_category, $t_name, $t_date, $t_status, $t_content, $t_image) {
		require_once('mysqli_connect.php');
        require_once('sqlNames.php');

        $query = "INSERT INTO $TASK_TABLE($ACCOUNT_ID, $CATEGORY_ID, $TASK_NAME, $TASK_DATE, $TASK_STATUS, $TASK_CONTENT, $TASK_IMG_SRC) VALUES (?, ?, ?, ?, ?, ?, ?)";
                
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