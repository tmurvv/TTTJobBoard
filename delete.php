<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php
    //Retrieve id for job editting
    $id = $_GET['id'];
  
    //Create Query
    $query = "SELECT * FROM joblistings WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->execute(array('id'=>$id));
    $delete=$statement->fetch();

    if(isset($_POST['delete'])){
        
        //Create delete query
        $query = "DELETE FROM joblistings WHERE id = ".$id;
        //Run delete query
        $db->exec($query);
        header("Location: admin.php");
    }
?>
    <!DOCTYPE html>

    <html lang="en">

    <?php include 'php/reusables/head.php' ?>

    <body>
        <?php include 'php/reusables/hero.php' ?>
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
            <?php include 'php/reusables/footer.php' ?>
        </section>
    </body>

    </html>