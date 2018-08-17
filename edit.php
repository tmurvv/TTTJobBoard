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
    $updateRecord=$statement->fetch();
?>
<?php include 'php/reusables/selectorQueries.php'; ?>
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
        'location' => $location,
        'id' => $id
    ];
    //Create Query
    $sql = "UPDATE joblistings SET 
                title = :title,
                description = :description,
                dateposted = :dateposted,
                category = :category,
                jobtype = :jobtype,
                location = :location 
                WHERE id=:id";
    //Prepare and execute query
    $stmt= $db->prepare($sql);
    $stmt->execute($newData);
    }
    header('Location: admin.php?id='.$id);
}
?>
<!DOCTYPE html>

    <html lang="en">

    <?php include 'php/reusables/head.php' ?>

    <body>
    <?php include 'php/reusables/hero.php' ?>
        <div class="addJob">
            <h2 class="addJob__mainHeading">
                Job<span>Board</span>
            </h2>

            <h3>Edit Job Listing</h3>
            <form method="post" action="edit.php?id=<?php echo $id; ?>">
                <div class="addJob__job">
                    <div class="addJob__job--title">
                        <input name="title" type="text" placeholder="Enter Job Title" value="<?php echo $updateRecord['title']; ?>">
                    </div>
                    <div class="addJob__job--datePosted">
                        <input name="dateposted" type="date" value="<?php echo $updateRecord['dateposted']; ?>">
                        <p style="display:inline; font-size:12px;"> Enter Date of Job Posting or Today's Date </p>
                    </div>
                    <div class="addJob__job--description">
                        <textarea name="description" id="" cols="100" rows="10" placeholder="Enter Job Description">
                            <?php echo $updateRecord['description']; ?>
                        </textarea>
                        <script>CKEDITOR.replace( 'description' );</script>
                    </div>

                    <select name="category" class="addSearch__form--selectBoxes-item" id="">
                        
                        <!-- <?php //while($row = $categories->fetch_assoc()) : ?> -->
                        <?php foreach($categories as $row) : ?>
                            <?php if ($updateRecord['category'] === $row['category']) {
                                $selected = 'selected';
                            }else{
                                $selected = "";
                            }
                            ?>
                        <option value="<?php echo $row['category']; ?>" <?php echo $selected; ?>>
                            <?php echo $row['category']; ?>
                        </option>
                        <?php endforeach; ?>
                        
                    </select>
                    <select name="jobtype" class="addSearch__form--selectBoxes-item" id="">
                        
                        <?php foreach($jobTypes as $row) : ?>
                            <?php if ($updateRecord['jobtype'] === $row['jobType']) {
                                $selected = 'selected';
                            }else{
                                $selected = "";
                            }
                            ?>
                            <option value="<?php echo $row['jobType']; ?>" <?php echo $selected; ?>>
                                <?php echo $row['jobType']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <select name="location" class="addSearch__form--selectBoxes-item" id="">
                    <?php foreach($locations as $row) : ?>
                            <?php if ($updateRecord['location'] === $row['location']) {
                                $selected = 'selected';
                            }else{
                                $selected = "";
                            }
                            ?>
                            <option value="<?php echo $row['location']; ?>" <?php echo $selected; ?>>
                                <?php echo $row['location']; ?>
                            </option>
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