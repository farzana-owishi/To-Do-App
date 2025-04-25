<!DOCTYPE html>
<html>
<head>
    <title>Simple To-Do List</title>
</head>
<body>
    <h1>My To-Do List</h1>
    
    <!-- Form to add tasks -->
    <form method="POST">
        <input type="text" name="task" placeholder="Enter a task" required>
        <button type="submit" name="add">Add Task</button>
    </form>

    <!-- Display tasks -->
    <ul>
        <?php
        session_start();
        if (!isset($_SESSION['tasks'])) {
            $_SESSION['tasks'] = array();
        }

        // Add task
        if (isset($_POST['add'])) {
            array_push($_SESSION['tasks'], $_POST['task']);
        }

        // Delete task
        if (isset($_GET['delete'])) {
            unset($_SESSION['tasks'][$_GET['delete']]);
        }

        // Show tasks
        foreach ($_SESSION['tasks'] as $key => $task) {
            echo "<li>$task <a href='index.php?delete=$key'>Delete</a></li>";
        }
        ?>
    </ul>
</body>
</html>