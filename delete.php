<?php 
    //Start the session
    session_start();
    $_SESSION['result']='';
     
    try{
        include 'php/config/config.php';
        include 'php/classes/Database.php';
        include 'php/helpers/controllers.php';
        include 'php/helpers/formatting.php';
    }catch (PDOException $ex) {
        echo 'File not found. Please contact the system administrator.';
    }

    //Validate Admin Token
    if (!$_SESSION['adminToken'] == $systemAdminToken) {
        echo 'Invalid token. Please navigate to adminLogin.php and enter the password to secure a valid token.';    
        return;
    }
?>
<?php
    //Retrieve id for job editting
    $id = $_GET['id'];
  
    //Create Query
    try{
        $query = "SELECT * FROM joblistings WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->execute(array('id'=>$id));
        $delete=$statement->fetch();
    }catch(PDOException $ex){
        $_SESSION['result'] = "An error occurred.";
    }

    if(isset($_POST['delete'])){
        
        try{
            //Create and run delete query
            $query = "DELETE FROM joblistings WHERE id = ".$id;
            $db->exec($query);
            header("Location: admin.php");
        }catch(PDOException $ex){
            $_SESSION['result'] = "An error occurred.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        try{
            include 'php/reusables/head.php';
        }catch (PDOException $ex) {
            $_SESSION['result'] = "An error occurred.";
        }
    ?>
</head>
<body>
    <?php 
        try{
            include 'php/reusables/hero.php';
        }catch (PDOException $ex) {
            $_SESSION['result'] = "An error occurred.";
        }
    ?>
    <?php 
        try{
            include 'php/reusables/displayMessage.php';
        } catch (PDOException $ex) {
            $_SESSION['result'] = "Error. Message to user not working.";
        }
    ?>
    <div class="deleteJob">
        <div class="deleteJob__ask">Delete Job Listing
            <br>
            '<?php echo $delete['title']; ?>'? </div>
        <form method="post" action="delete.php?id=<?php echo $id; ?>">
            <input name="delete" type="submit" class="btn btn__danger" value="Delete" />
        </form>
        <a href="admin.php" class="btn btn__secondary">Cancel</a>
    </div>
    <!-- FOOTER -->
    <section>
        <?php 
            try{
                include 'php/reusables/footer.php';
            }catch (PDOException $ex) {
                $_SESSION['result'] = "An error occurred.";
            }
        ?>
    </section>
</body>

</html>