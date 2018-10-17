<?php /**************
 * This file adds a user called 'admin' to a database called 'jobboard_users'.
 * A hashed password is also added. This admin password is required to update 
 * the jobboard. This is a temporary fix until a full user login system can be
 * implemented.
 ********************/ ?>

<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/controllers.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php
    $hashedPassword = password_hash("admin4014", PASSWORD_DEFAULT);
    $username = "admin";

    try {$sql = "INSERT INTO jobboard_users(  
        username,
        password 
        ) VALUES(
            :username,
            :password                
        )";
        //Prepare and execute query
        $stmt= $db->prepare($sql);
        $stmt->execute(array(':username' => $username, ':password' => $hashedPassword));
        echo "Admin user entered."; 
    }catch (PDOException $ex) {
        echo "An error occurred.";
    }   
?>
    