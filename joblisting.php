<?php
    // Start the session
    session_start();
?>
<?php     
    try{
        include 'php/config/config.php';
        include 'php/classes/Database.php';
        include 'php/helpers/controllers.php';
        include 'php/helpers/formatting.php';
    }catch (PDOException $ex) {
        echo 'File not found. Please contact the system administrator.';
    } 
?>
<?php
  //Go back to index page?
  if (isset($_POST['back'])) {
    header("Location: index.php");
    exit;
  }

  //Retrieve id for jobListing
  $id = $_GET['id'];

  //Execute query
  try{
        $query = "SELECT * FROM joblistings WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->execute(array('id'=>$id));
        $listing=$statement->fetch();
    }catch(PDOException $ex){
        $result = "An error occurred.";
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'php/reusables/head.php' ?>
<body>
    <?php include 'php/reusables/hero.php' ?>
    <div class="mainBoard" id="jobs">      
        <h1>Job<span>Board</span></h1>
        <!-- check for message to user -->
        <?php 
            try{
                include 'php/reusables/displayMessage.php';
            } catch (PDOException $ex) {
                $_SESSION['result'] = "Something went wrong.";
            }
        ?>
        <!-- Show 'Back to Job Listings' button -->
        <a href="index.php" class="btn btn__secondary btn__shadow" style="text-decoration:none;">Back to job listings</a>
        <!-- show job listing -->
        <div class="listings">
            <?php if($listing) : ?>
            <div class="listings__job">
                <div class="listings__job--type">
                    <p class="btn btn__secondary">
                        <?php echo $listing['jobtype'] ?>
                    </p>
                </div>
                <div class="listings__job--info">
                    <div class="listings__job--info-line1">
                        <h2>
                            <?php echo $listing['title'] ?>
                            <?php echo $listing['location'] ?>
                        </h2>
                    </div>
                    <div class="listings__job--info-line2">
                        <?php echo $listing['category'] ?>
                        <div class="listings__job--info-line2-datePosted">
                            <?php echo $listing['dateposted'] ?>
                        </div>
                    </div>
                    <br>
                    <div class="listings__job--info-description">
                        <?php echo $listing['description'] ?>
                    </div>
                </div>
            </div>
            <br>
            <hr>
                <?php endif; ?>
        </div>
    </div>
    <!-- FOOTER -->
    <section>
        <?php include 'php/reusables/footer.php' ?>
    </section>
</body>
</html>