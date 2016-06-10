<html>
    <body>
    
        <form action="taskAdded.php" method="post" id = "addTaskForm">
        
            <b>Add a new Task</b>
            
            <p>Task Name:
            <input type="text" name="task_name" size="30" value=""/>
            </p>
            
            <p>Task Category:
            <select name="task_category" form = "addTaskForm">
            <?php
                require_once('mysqli_connect.php');
                require_once('sqlNames.php');

                $query = "SELECT * FROM $CATEGORY_TABLE WHERE $ACCOUNT_ID = 0 OR $ACCOUNT_ID = $t_account";
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
            
            <p>Task Image:
            <input type="text" name="task_Image" size="30" value=""/>
            </p>
            
            <p>
                <input type="submit" name="submit" value="Send" />
            </p>
        
        </form>
    </body>
</html>