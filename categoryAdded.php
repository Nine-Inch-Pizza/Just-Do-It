<html>
    <head>
        <title>Add Category</title> 
        <script src="http://www.w3schools.com/lib/w3data.js"></script>
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
                
                require "addCategoryFunction.php";
                addCategory($category_name, 1);

            } else {
                
                echo 'You need to enter the following data<br />';
                
                foreach($data_missing as $missing){
                    
                    echo "$missing<br />";
                    
                }
                
            }
            
        }
        
        ?>
        
       <div w3-include-html = "addCategory.php"></div>
        <script>
            w3IncludeHTML();
        </script>
    </body>
</html>