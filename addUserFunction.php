<?php
	function addUser($username, $password) {

		require_once('sqlNames.php');
        require_once('mysqli_connect.php');
        
        $query = "INSERT INTO $ACCOUNT_TABLE($USERNAME, $PASSWORD) VALUES (?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        //i Integers
        //d Doubles
        //b Blobs
        //s Everything Else
        
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'User Entered';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);

            $_SESSION["account_id"] = mysqli_insert_id();
            // echo $_SESSION["account_id"];
            header("Location: addTask.php");
            exit();
            
        } else {
            
            echo 'Error Occured<br />';
            echo mysqli_error($dbc);
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
                
        }
	}
?>