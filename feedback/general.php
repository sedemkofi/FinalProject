
<?php
    // TODO general error handling
    if(isset($_GET['error'])){
        if($_GET['error'] == "connection-error"){
            echo "<script>alert('Connection error. Please try again.')</script>";
        }
    }
?>