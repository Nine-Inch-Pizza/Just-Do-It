<html>
    <head>
        <title>Add Task</title>
    </head>
    <body>
        <?php
        
        if(isset($_POST['submit'])){
            
            $data_missing = array();
            
            if(empty($_POST['task_name'])){
                $data_missing[] = "Task Name";
            } else{
                $t_name = trim($_POST['task_name']);
            }
            
            if(empty($_POST['task_category'])){
                $data_missing[] = "Task Category";
            } else{
                $t_category = trim($_POST['task_category']);
            }
            
            if(empty($_POST['task_date'])){
                $data_missing[] = "Task Date";
            } else{
                $t_date = trim($_POST['task_date']);
            }
            
            if(empty($_POST['task_Status'])){
                $data_missing[] = "Task Status";
            } else{
                $t_status = trim($_POST['task_Status']);
            }
            
            if(empty($_POST['task_Content'])){
                // $data_missing[] = "Task Content";
            } else{
                $t_content = trim($_POST['task_Content']);
            }
            
            if(empty($_POST['task_Image'])){
                // $data_missing[] = "Task Image";
            } else{
                $t_image = trim($_POST['task_Image']);
            }        
            
            $t_account = 1;
            
            if(empty($data_missing)){
                
                require 'addTaskFunction.php';
                addTask($t_account, $t_category, $t_name, $t_date, $t_status, $t_content, $t_image);    
                
            } else {
                
                echo 'You need to enter the following data<br />';
                
                foreach($data_missing as $missing){
                    
                    echo "$missing<br />";
                    
                }   
            }
        }
        
        ?>
        
        <form action="http://localhost/prosdev/taskAdded.php" method="post">
        
            <b>Add a new Task</b>
            
            <p>Task Name:
            <input type="text" name="task_name" size="30" value=""/>
            </p>
            
            <p>Task Category:
            <input type="number" name="task_category" size="30" value=""/>
            </p>
            
            <p>Task Date:
            <input type="date" name="task_date" size="30" value=""/>
            </p>
            
            <p>Task Status:
            <input type="number" name="task_Status" size="30" value=""/>
            </p>
            
            <p>Task Content:
            <input type="text" name="task_Content" size="30" value=""/>
            </p>
            
            <p>Task Image:
            <input type="image" name="task_Image" size="30" value=""/>
            </p>
            
            <p>
                <input type="text" name="submit" value="Send" />
            </p>
        
            
        </form>
    </body>
</html>