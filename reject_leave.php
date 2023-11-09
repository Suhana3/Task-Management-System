<?php
    include('includes/connection.php');
        $sql = "UPDATE leaves SET status='Rejected' WHERE lid = $_GET[id]";
        $query_run = mysqli_query($conn, $sql);

        if($query_run){
            echo "<script type='text/javascript'>
                alert('Leave Status Updated Successfully...');
                window.location.href='leave_app.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
                alert('Error.. Please Try Again!');
                window.location.href='leave_app.php';
            </script>";
        }
?>