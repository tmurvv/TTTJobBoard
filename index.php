<?php
    $thisURL = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $myMessage = $_GET['msg'];
    
    if ($myMessage == "Record Added") {
        header("Location: admin.php?msg=added");  
    } 
    if ($myMessage == "Record Deleted") {
        header("Location: admin.php?msg=deleted");  
    } 
    if ($myMessage == "Record Updated") {
        header("Location: admin.php?msg=updated");  
    }
?>
<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/controllers.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php
    $categorySearchID = $_GET['category'];

    //Initialize category search ID
    if(!$categorySearchID){
        $categorySearchID = "empty";
    }
    $jobtypeSearchID = $_GET['jobtype'];
    if (!$jobtypeSearchID){
        $jobtypeSearchID = "empty";
    }
    $locationSearchID = $_GET['location'];
    if (!$locationSearchID){
        $locationSearchID = "empty";
    }
    
    //Create Query
    $query=createQuery($categorySearchID, $jobtypeSearchID, $locationSearchID);
    $statement = $db->prepare($query);
    $statement->execute();
    $listings=$statement->fetchAll();
?>
<!-- Create Selector Queries for search area select boxes-->
<?php include 'php/reusables/selectorQueries.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'php/reusables/head.php'; ?>

<body>
    <?php include 'php/reusables/hero.php'; ?>

    <div class="search">
        <div class="search__form">
            <div class="search__form--title">
                <h2>Search</h2>
            </div>
            <div class="search__form--selectBoxes">
                <form action="index.php?this.options[this.selectedIndex].value" id="main" name="main" method="get">
                    <?php include 'php/reusables/selectors.php';?>                           
                </form>
            </div>
        </div>
        <div class="mainBoard" id="jobs">
            <h1>
                Job
                <span>Board</span>
            </h1>
            <div class="listings">
                <?php if($listings) : ?>
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
        <?php include 'php/reusables/contact.php' ?>
    </section>
    <!-- FOOTER -->
    <section>
        <?php include 'php/reusables/footer.php' ?>
    </section>

</body>

</html>