<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/controllers.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php
  //Retrieve id for jobListing
  $id = $_GET['id'];

  //Create DB Object
  $categorySearchID = $_GET['category'];
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

  $query = "SELECT * FROM joblistings WHERE id = :id";
  $statement = $db->prepare($query);
  $statement->execute(array('id'=>$id));
  $listing=$statement->fetch();
?>
<!-- Create Selector Queries for search area select boxes-->
<?php include 'php/reusables/selectorQueries.php'; ?>

<!DOCTYPE html>

<html lang="en">
<?php include 'php/reusables/head.php' ?>
<body>
    <?php include 'php/reusables/hero.php' ?>
    <div class="search">
        <div class="search__form">
            <div class="search__form--title">
                <h2>Search</h2>
            </div>
            <div class="search__form--selectBoxes">
                <form action="index.php?this.options[this.selectedIndex].value" id="main" name="main" method="get">
                    <?php include 'php/reusables/selectors.php' ?>
                </form>
            </div>
        </div>
        <div class="mainBoard" id="jobs">
            <h1>Job<span>Board</span></h1>
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
    </div>

    <!-- FOOTER -->
    <section>
        <?php include 'php/reusables/footer.php' ?>
    </section>

</body>
</html>