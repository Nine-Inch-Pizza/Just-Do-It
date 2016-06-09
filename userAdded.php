<html>
    <head>
        <title>Add User</title>
    </head>
    <body>
        <?php
        
        if(isset($_POST['submit'])){
            
            $data_missing = array();
            
            if(empty($_POST['username'])){
                $data_missing[] = "Password";
            } else{
                $username = trim($_POST['username']);
            }
            
            if(empty($_POST['password'])){
                $data_missing[] = "Password";
            } else{
                $password = trim($_POST['password']);
            }
            

            
            if(empty($data_missing)){
                
                
                require_once('mysqli_connect.php');
                
                $query = "INSERT INTO user_account(account_id, username, password) VALUES (NULL, ?, ?)";
                
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
                    
                } else {
                    
                    echo 'Error Occured<br />';
                    echo mysqli_error($dbc);
                    
                    mysqli_stmt_close($stmt);
                    
                    mysqli_close($dbc);
                        
                }
                
            } else {
                
                echo 'You need to enter the following data<br />';
                
                foreach($data_missing as $missing){
                    
                    echo "$missing<br />";
                    
                }
                
            }
            
        }
        
        ?>
        
        <form action="http://localhost/prosdev/userAdded.php" method="post">
        
            <b>Add a new User</b>
            
            <p>Username:
            <input type="text" name="username" size="30" value=""/>
            </p>
            
            <p>Password
            <input type=password name="password" size="30" value=""/>
            </p>
            
            <p>
                <input type="submit" name="submit" value="Send" />
            </p>
        
            
        </form>
    </body>
</html>