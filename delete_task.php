<?php
include('includes/connection.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM tasks WHERE tid = $id";
    $query_run = mysqli_query($conn, $sql);
    
    if($query_run){
        echo "<script type='text/javascript'>
            alert('Task deleted Successfully...');
            window.location.href='manage_task.php';
        </script>";
    }
    else{
        echo "<script type='text/javascript'>
            alert('Error.. Please Try Again!');
            window.location.href='manage_task.php';
        </script>";
    }
} else {
    echo "Invalid task ID or no ID provided.";
}
?>