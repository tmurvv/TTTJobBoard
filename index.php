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

    $categorySearchID = "empty";
    $jobtypeSearchID = "empty";
    $locationSearchID = "empty";

    if (isset($_POST['submit'])) {
        //Get POST variables
        $categorySearchID = $_POST['category'];
        $jobtypeSearchID = $_POST['jobtype'];
        $locationSearchID = $_POST['location'];   
    }
    
    //Create and execute Query  
    try{
        $query=createQuery($categorySearchID, $jobtypeSearchID, $locationSearchID);
        $statement = $db->prepare($query);
        $statement->execute();
        $listings=$statement->fetchAll();

        //if no job listings found
        if (count($listings) == 0) {
            $_SESSION['result'] = "No job listings found.";
        }
    }catch (PDOException $ex) {
        $_SESSION['result'] = "An error occurred.";
    }
        
?>
<!-- Create Selector Queries for search area select boxes-->
<?php try{
    include 'php/reusables/selectorQueries.php';
    }catch (PDOException $ex) {
        $_SESSION['result'] = "An error occurred.";
    }
?>
<!DOCTYPE html>
<head>
    <html lang="en">
    <?php try{
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
    <div class="search">
        <div class="search__form">
            <div class="search__form--title">
                <h2>Search</h2>
            </div>
            <div class="search__form--selectBoxes">           
                <form action="index.php?this.options[this.selectedIndex].value" id="main" name="main" method="post">                
                <?php 
                    try{
                        include 'php/reusables/selectors.php';
                    } catch (PDOException $ex) {
                        $_SESSION['result'] = "An error occurred.";
                    }
                ?>                           
                </form>
            </div>
        </div>
        <?php 
            try{
                include 'php/reusables/displayMessage.php';
            } catch (PDOException $ex) {
                $_SESSION['result'] = "An error occurred.";
            }
        ?>
        <div class="mainBoard" id="jobs">
            <h1>
                Job<span>Board</span>
            </h1>
            <div class="listings">
                <?php if(isset($listings)) : ?>
                <?php foreach($listings as $row) : ?>
                <div class="listings__job">
                    <div class="listings__job--type">
                        <p class="btn btn__secondary">
                            <?php echo $row['jobtype'] ?>
                        </p>
                    </div>
                    <div class="listings__job--info">
                        <div class="listings__job--info-line1">
                            <h2>
                                <?php echo $row['title'] ?>
                                <?php echo $row['location'] ?>
                            </h2>
                        </div>
                        <div class="listings__job--info-line2">
                            <?php echo $row['category'] ?>
                            <div class="listings__job--info-line2-datePosted">
                                <?php echo $row['dateposted'] ?>
                            </div>
                        </div>
                        <br>
                        <div class="listings__job--info-description">
                            <?php echo concatText($row['description']) ?>
                            <a href="joblisting.php?id=<?php echo urlencode($row['id']); ?>" class="listings__job--info-descriptionReadMore">read more</a>
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <!-- Contact -->
    <section>
        <?php 
            try{
                include 'php/reusables/contact.php';
            }catch (PDOException $ex) {
                $_SESSION['result'] = "An error occurred.";
            }
        ?>
    </section>
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