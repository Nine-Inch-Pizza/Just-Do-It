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
            <input type="text" name="task_Image" size="30" value=""/>
            </p>
            
            <p>
                <input type="submit" name="submit" value="Send" />
            </p>
        
            
        </form>
    
    </body>
</html>