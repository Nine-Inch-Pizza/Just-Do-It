<html>
    <head>
        <title>Add Category</title>
    </head>
    <body>
        <?php
        
        if(isset($_POST['submit'])){
            
            $data_missing = array();
            
            if(empty($_POST['category_name'])){
                $data_missing[] = "Category Name";
            } else{
                $category_name = trim($_POST['category_name']);
            }
            
            if(empty($data_missing)){
                
                
                require_once('mysqli_connect.php');
                
                $query = "INSERT INTO categories(category_id, category_name) VALUES (NULL, ?)";
                
                $stmt = mysqli_prepare($dbc, $query);
                
                //i Integers
                //d Doubles
                //b Blobs
                //s Everything Else
                
                mysqli_stmt_bind_param($stmt, "s", $category_name);
                
                
                mysqli_stmt_execute($stmt);
                
                $affected_rows = mysqli_stmt_affected_rows($stmt);
                
                if($affected_rows == 1){
                    
                    echo 'Category Entered';
                    
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
        
        <form action="http://localhost/prosdev/categoryAdded.php" method="post">
        
            <b>Add a new Task Category</b>
            
            <p>Category:
            <input type="text" name="category_name" size="30" value=""/>
            </p>
            
            <p>
                <input type="submit" name="submit" value="Send" />
            </p>
        
            
        </form>
    </body>
</html>