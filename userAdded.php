<html>
    <head>
        <title>Add User</title>
        <script src="http://www.w3schools.com/lib/w3data.js"></script>
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
                
               require_once('addUserFunction.php');
               addUser($username, $password);
                
            } else {
                
                echo 'You need to enter the following data<br />';
                
                foreach($data_missing as $missing){
                    
                    echo "$missing<br />";
                    
                }
                
            }
            
        }
        
        ?>
        
        <div w3-include-html = "addUser.php"></div>
        <script>
            w3IncludeHTML();
        </script>
    </body>
</html>