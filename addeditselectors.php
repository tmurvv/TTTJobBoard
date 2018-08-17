<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php
    //Retrieve id for edit/delete
    $id = $_GET['id'];
    include 'php/reusables/selectorQueries.php';
?>
<?php 
    if(isset($_POST['addcat'])){
        //Assign Vars   
        $category = $_POST['category'];
        $categoryvieworder = $_POST['categoryvieworder'];
       
        //Create Data
        $newData = [
            'category' => $category,
            'categoryvieworder' => $categoryvieworder
        ];

        //Create Query
        $sql = "INSERT INTO categories(  
                    category,
                    categoryvieworder
                    ) VALUES(
                        :category,
                        :categoryvieworder      
                    )";

        //Prepare and execute query
        $stmt= $db->prepare($sql);
        $stmt->execute($newData);
        header('Location: addeditselectors.php'); 
    }
    if(isset($_POST['editcat'])){
        //Assign Vars   
        $category = $_POST['category'];
        $categoryvieworder = $_POST['categoryvieworder'];
        $oldCategory= $_POST['oldCategory'];
        
        //Create Data
        $newData = [
            'category' => $category,
            'categoryvieworder' => $categoryvieworder,
            'id' => $id
        ];
        //Create Query
        $sql = "UPDATE categories SET 
                    category = :category,
                    categoryvieworder = :categoryvieworder
                    WHERE id=:id";
        //Prepare and execute query
        $stmt= $db->prepare($sql);
        $stmt->execute($newData);
        header('Location: addeditselectors.php');
    }
    if(isset($_POST['deletecat'])){
        
        //Create delete query
        $query = "DELETE FROM categories WHERE id = ".$id;
        //Run delete query
        $db->exec($query);
        header("Location: addeditselectors.php");
    }

    if(isset($_POST['addjobtype'])){
        //Assign Vars   
        $jobtype = $_POST['jobtype'];
        $jobtypevieworder = $_POST['jobtypevieworder'];
        
        //Create Data
        $newData = [
            'jobtype' => $jobtype,
            'jobtypevieworder' => $jobtypevieworder
        ];

        //Create Query
        $sql = "INSERT INTO jobtypes(  
                    jobtype,
                    jobtypevieworder
                    ) VALUES(
                        :jobtype,
                        :jobtypevieworder      
                    )";

        //Prepare and execute query
        $stmt= $db->prepare($sql);
        $stmt->execute($newData);
        header('Location: addeditselectors.php');
    }
    if(isset($_POST['editjobtype'])){
        //Assign Vars   
        $jobtype = $_POST['jobtype'];       
        $jobtypevieworder = $_POST['jobtypevieworder'];
        
        //Create Data
        $newData = [
            'jobtype' => $jobtype,
            'jobtypevieworder' => $jobtypevieworder,
            'id' => $id
        ];
        //Create Query
        $sql = "UPDATE jobtypes SET 
                    jobtype = :jobtype,
                    jobtypevieworder = :jobtypevieworder
                    WHERE id=:id";
        //Prepare and execute query
        $stmt= $db->prepare($sql);
        $stmt->execute($newData);
        header('Location: addeditselectors.php');
    }
    if(isset($_POST['deletejobtype'])){
        
        //Create delete query
        $query = "DELETE FROM jobtypes WHERE id = ".$id;
        //Run delete query
        $db->exec($query);
        header("Location: addeditselectors.php");
    }
    if(isset($_POST['addlocation'])){
        //Assign Vars   
        $location = $_POST['location'];
        $locationvieworder = $_POST['locationvieworder'];
        
        //Create Data
        $newData = [
            'location' => $location,
            'locationvieworder' => $locationvieworder
        ];

        //Create Query
        $sql = "INSERT INTO locations(  
                    location,
                    locationvieworder
                    ) VALUES(
                        :location,
                        :locationvieworder      
                    )";

        //Prepare and execute query
        $stmt= $db->prepare($sql);
        $stmt->execute($newData);
        header('Location: addeditselectors.php');
    }
    if(isset($_POST['editlocation'])){
        //Assign Vars   
        $location = $_POST['location'];
        $locationvieworder = $_POST['locationvieworder'];
        
        //Create Data
        $newData = [
            'location' => $location,
            'locationvieworder' => $locationvieworder,
            'id' => $id
        ];
        //Create Query
        $sql = "UPDATE locations SET 
                    location = :location,
                    locationvieworder = :locationvieworder
                    WHERE id=:id";
        //Prepare and execute query
        $stmt= $db->prepare($sql);
        $stmt->execute($newData);
        header('Location: addeditselectors.php');
    }
    if(isset($_POST['deletelocation'])){
        
        //Create delete query
        $query = "DELETE FROM locations WHERE id = ".$id;
        //Run delete query
        $db->exec($query);
        header("Location: addeditselectors.php");
    }
?>
<!DOCTYPE html>

<html lang="en">

<?php include 'php/reusables/head.php' ?>

<body>
    <?php include 'php/reusables/hero.php' ?>
    <div class="updateSelectorsHeading">
        <h2 class="addJob__mainHeading">Job<span>Board</span></h2>

        <h3>Add/Edit/Delete Selectors</h3>
    </div>
    <div class="updateSelectors">

        <div class="updateSelectors__selector" id="categories">
            <h4>Update Categories</h4>
            <p>SelectBox Order | Category</p>
            <form class="updateSelectors__selector--add" method="post" action="addeditselectors.php">
                <input type="text" name="categoryvieworder" placeholder="" />
                <input type="text" name="category" placeholder="Add Category" class="btn" />
                <button class="btn btn__primary" type="submit" name="addcat">Add</button>
            </form>

            <table name="category">

                <?php foreach($categories as $row) : ?>
                <form method="post" action="addeditselectors.php?id=<?php echo $row['id'] ?>">
                    <div class="updateSelectors__selector--item">
                        <div class="updateSelectors__selector--item-order">
                            <input name="categoryvieworder" value="<?php echo $row['categoryViewOrder']; ?>"
                                disabled />
                            <input name="categoryvieworder" value="<?php echo $row['categoryViewOrder']; ?>"
                                hidden />
                        </div>
                        <div class="updateSelectors__selector--item-itemName">
                            <input name="category" value="<?php echo $row['category']; ?>" disabled />
                            <input name="category" id="categoryInitValue" value="<?php echo $row['category']; ?>" hidden />
                        </div>
                        <div class="updateSelectors__selector--item-saveEdit">
                            <button class="btn btn__primary" type="button" onclick="startEditSelector(this);"
                                name="editcat">Edit</button>
                        </div>
                        <div class="updateSelectors__selector--item-saveEdit">
                            <button type="button" name="deletecat" class="btn btn__danger" onclick="startEditSelector(this);">Delete</button>
                        </div>
                        <input name="oldCategory" value="<?php echo $row['category']; ?>" hidden />
                    </div>
                </form>
                <?php endforeach; ?>

            </table>
        </div>
        <hr>
        <div class="updateSelectors__selector" id="jobTypes">
            <h4>Update Job Types</h4>
            <p>SelectBox Order | Job Type</p>
            <form class="updateSelectors__selector--add" method="post" action="addeditselectors.php">
                <input type="text" name="jobtypevieworder" placeholder="" class="btn updateSelectors__selector--item-order" />
                <input type="text" name="jobtype" placeholder="Add Job Type" class="btn" />
                <button class="btn btn__primary" type="submit" name="addjobtype">Add</button>
            </form>
            <table name="jobtypes" id="">

                <?php foreach($jobTypes as $row) : ?>
                <form method="post" action="addeditselectors.php?id=<?php echo $row['id'] ?>">
                    <div class="updateSelectors__selector--item">
                        <div class="updateSelectors__selector--item-order">
                            <input name="jobtypevieworder" value="<?php echo $row['jobTypeViewOrder']; ?>"
                                disabled />
                            <input name="jobtypevieworder" value="<?php echo $row['jobTypeViewOrder']; ?>"
                                hidden />
                        </div>
                        <div class="updateSelectors__selector--item-itemName">
                            <input name="jobtype" value="<?php echo $row['jobType']; ?>" disabled />
                            <input name="jobtype" value="<?php echo $row['jobType']; ?>" hidden />
                        </div>
                        <div class="updateSelectors__selector--item-saveEdit">
                            <button class="btn btn__primary" type="button" onclick="startEditSelector(this);"
                                name="editjobtype">Edit</button>
                        </div>
                        <div class="updateSelectors__selector--item-saveEdit">
                            <button type="button" name="deletejobtype" class="btn btn__danger" onclick="startEditSelector(this);">Delete</button>
                        </div>
                    </div>
                </form>
                <?php endforeach; ?>

            </table>

        </div>
        <hr>
        <div class="updateSelectors__selector" id="locations">
            <h4>Update Locations</h4>
            <p>SelectBox Order | Location</p>
            <form class="updateSelectors__selector--add" method="post" action="addeditselectors.php">
                <input type="text" name="locationvieworder" placeholder="" class="btn updateSelectors__selector--item-order" />
                <input type="text" name="location" placeholder="Add Location" class="btn" />
                <button class="btn btn__primary" type="submit" name="addlocation">Add</button>
            </form>

                <?php foreach($locations as $row) : ?>
                <form method="post" action="addeditselectors.php?id=<?php echo $row['id'] ?>">
                    <div class="updateSelectors__selector--item">
                        <div class="updateSelectors__selector--item-order">
                            <input name="locationvieworder" value="<?php echo $row['locationViewOrder']; ?>"
                                disabled/>
                            <input name="locationvieworder" value="<?php echo $row['locationViewOrder']; ?>"
                                hidden/>
                        </div>
                        <div class="updateSelectors__selector--item-itemName">
                            <input name="location" value="<?php echo $row['location']; ?>" disabled/>
                            <input name="location" value="<?php echo $row['location']; ?>" hidden/>
                        </div>
                        <div class="updateSelectors__selector--item-saveEdit">
                            <button class="btn btn__primary" type="button" onclick="startEditSelector(this);"
                                name="editlocation">Edit</button>
                        </div>
                        <div class="updateSelectors__selector--item-saveEdit">
                            <button type="button" name="deletelocation" class="btn btn__danger" onclick="startEditSelector(this);">Delete</button>
                        </div>
                    </div>
                </form>
                <?php endforeach; ?>         
        </div>
    </div>

    <!-- FOOTER -->
    <section>
        <?php include 'php/reusables/footer.php' ?>
    </section>

</body>

</html>