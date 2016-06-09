<html>
    <head>
        <title>
            Add Task
        </title>
    </head>
    <body>
    
        <form action="http://localhost/prosdev/taskAdded.php" method="post">
        
            <b>Add a new Task</b>
            
            <p>Task Name:
            <input type="text" name="task_name" size="30" value=""/>
            </p>
            
            <p>Task Category:
            <select name="task_category">
            <?php
                require_once('mysqli_connect.php');

                $query = "SELECT * FROM categories";
                $response = @mysqli_query($dbc, $query);

                while($row = mysqli_fetch_array($response)){
                    echo    "<option value = " . $row['category_id'] . ">" .
                            $row['category_name'] . "</option>";
                }

            ?>
            </select>
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
            
            <!-- <p>Task Image:
            <input type="text" name="task_Image" size="30" value=""/>
            </p> -->
            
            <p>
                <input type="submit" name="submit" value="Send" />
            </p>
        
            
        </form>
    
    </body>
</html>