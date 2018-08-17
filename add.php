<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
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
      $error = 'Please fill out all required fields.';
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
    //Create Query
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
    //Prepare and execute query
    $stmt= $db->prepare($sql);
    $stmt->execute($newData); 
    $last_id = $db->lastInsertId();
    }
    header('Location: joblisting.php?id='.$last_id);
    //   $query = "INSERT INTO joblistings
    //               (title, description, dateposted, category, jobtype, location)
    //               VALUES('$title', '$description', '$dateposted', '$category', '$jobtype', '$location')";
    //   $insert_row = $db->insert($query);           
    // }
    // header("Location: admin.php", true, 301);
    
  }
?>
<!-- Create Selector Queries -->
<?php include 'php/reusables/selectorQueries.php'; ?>
    <!DOCTYPE html>

    <html lang="en">

    <?php include 'php/reusables/head.php' ?>

    <body>
    <?php include 'php/reusables/hero.php' ?>
        <div class="addJob">
            <h2>
                <a href="index.php">Job<span>Board</span></a>
            </h2>

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
        <?php include 'php/reusables/footer.php' ?>
    </section>

    </body>

    </html>