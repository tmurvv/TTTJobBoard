<?php
  //Create queries to populate search select boxes
    //category query
    $query = "SELECT * FROM categories ORDER BY categoryViewOrder";
    $statement = $db->prepare($query);
    $statement->execute(array());
    $categories=$statement->fetchAll();

    //Job Type query
    $query = "SELECT * FROM jobtypes ORDER BY jobTypeViewOrder";
    $statement = $db->prepare($query);
    $statement->execute(array());
    $jobTypes=$statement->fetchAll();

    //Location query
    $query = "SELECT * FROM locations ORDER BY locationViewOrder";
    $statement = $db->prepare($query);
    $statement->execute(array());
    $locations=$statement->fetchAll();
?>