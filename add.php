<?php
    //Start the session
    session_start();
    $_SESSION['result']='';

    //Validate Admin Token
    if (!$_SESSION['adminToken'] == '4a70afd6-96f1-4e36-b3cd-92288096e5e8') {
        echo 'Invalid token. Please navigate to adminLogin.php and enter the password to secure a valid token.';    
        return;
    }
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
  if(isset($_POST['submit'])){
    //Assign Vars
    $title = $_POST['title'];
    $description = $_POST['description'];
    $dateposted = $_POST['dateposted'];
    $category = $_POST['category'];
    $jobtype = $_POST['jobtype'];
    $location = $_POST['location'];
    
    //Simple validation
    if($title == ''){
      //Set error
      $_SESSION['result'] = 'Job Title is a required field.';
    } else {

        //Create Data
        $newData = [
            'title' => $title,
            'description' => $description,
            'dateposted' => $dateposted,
            'category' => $category,
            'jobtype' => $jobtype,
            'location' => $location
        ];
        //Create, prepare, execute Query
        try{
            $sql = "INSERT INTO joblistings(  
                    title,
                    description, 
                    dateposted, 
                    category, 
                    jobtype, 
                    location 
                    ) VALUES(
                        :title,
                        :description,
                        :dateposted,
                        :category,
                        :jobtype,
                        :location                
                    )";
            $stmt= $db->prepare($sql);
            $stmt->execute($newData); 
            $last_id = $db->lastInsertId();
        }catch(PDOException $error){
            $_SESSION['result'] = "An error occurred.";
        }       
        header('Location: joblisting.php?id='.$last_id);
        exit;
    }
  }   
?>
<?php
    //Create Selector Queries
    try{
        include 'php/reusables/selectorQueries.php';
    }catch(PDOException $_COOKIE) {
        $_SESSION['result'] = "An error occurred.";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php 
        try{
            include 'php/reusables/head.php';
        }catch(PDOException $ex){
            $_SESSION['result'] = "An error occurred.";
        }
    ?>
<body>
    <?php 
        try{
            include 'php/reusables/hero.php';
        }catch(PDOException $ex){
            $_SESSION['result'] = "An error occurred.";
        }
    ?>
    <div class="addJob">
        <h2>
            Job<span>Board</span>
        </h2>
        <?php 
            try{
                include 'php/reusables/displayMessage.php';
            } catch (PDOException $ex) {
                $_SESSION['result'] = "Error. Message to user not working.";
            }
        ?>
        <h3>New Job Listing</h3>
        <form method="post" action="add.php">
            <div class="addJob__job">
                <div class="addJob__job--title">
                    <input name="title" type="text" placeholder="Enter Job Title">
                </div>
                <div class="addJob__job--datePosted">
                    <input name="dateposted" type="date">
                    <p style="display:inline; font-size:12px;"> Enter Date of Job Posting or Today's Date </p>
                </div>
                <div class="addJob__job--description">
                    <textarea name="description" id="" cols="100" rows="10" placeholder="Enter Job Description"></textarea>
                    <script>CKEDITOR.replace( 'description' );</script>
                </div>

                <select name="category" class="addSearch__form--selectBoxes-item" id="">
                <option value="Not Listed">Any Category</option>
                    <?php foreach($categories as $row) : ?>                    
                        <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="jobtype" class="addSearch__form--selectBoxes-item" id="">
                    <option value="Not Listed">Any Type</option>
                    <?php foreach($jobTypes as $row) : ?>                       
                        <option value="<?php echo $row['jobType']; ?>"><?php echo $row['jobType']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="location" class="addSearch__form--selectBoxes-item" id="">
                    <option value="Not Listed">Any Location</option>
                    <?php foreach($locations as $row) : ?>                       
                        <option value="<?php echo $row['location']; ?>"><?php echo $row['location']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" name="submit" class="addSearch__form--selectBoxes-item btn btn__primary" value="Submit" />
            <a href="admin.php" class="edit__cancel btn btn__secondary">Cancel</a>
        </form>
    </div>
<!-- FOOTER -->
<section>
    <?php 
        try{
            include 'php/reusables/footer.php'; 
        }catch(PDOException $ex) {
            $_SESSION['result'] = "An error occurred.";
        }
    ?>
</section>
</body>
</html>