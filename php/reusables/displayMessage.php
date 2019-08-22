<?php //if result variable, displays message to user
    if(isset($_SESSION['result']) && !$_SESSION['result']==''){
        echo "<div class='messageBox'><h3>";
        echo $_SESSION['result']; 
        echo "</h3></div>";
        $_SESSION['result'] = ""; 
    }
?>