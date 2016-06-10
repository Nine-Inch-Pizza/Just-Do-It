<?php
	function addCategory($category_name, $account_id) {
		require_once('mysqli_connect.php');
		require_once('sqlNames.php');
                
        $query = "INSERT INTO $CATEGORY_TABLE($CATEGORY_NAME, $ACCOUNT_ID) VALUES (?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
        
        mysqli_stmt_bind_param($stmt, "si", $category_name, $account_id);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Category Entered';
            
        } else {
            
            echo 'Error Occured<br/>';
            echo mysqli_error($dbc);
                
        }

        mysqli_stmt_close($stmt);
        
        mysqli_close($dbc);
	}
?>