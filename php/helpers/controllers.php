<?php
/*  create queries to filter job listing results by inputs from 
    search select boxes (category, Job Type, Location)  */ 

function createQuery($categorySearchID, $jobtypeSearchID, $locationSearchID) {
    if ($locationSearchID == 'empty') {
        if ($categorySearchID=="empty" && $jobtypeSearchID=="empty") {
            $query = "SELECT * FROM joblistings ORDER BY dateposted DESC";
        }elseif($jobtypeSearchID!=="empty" && $categorySearchID == "empty") { 
            $query = "SELECT * FROM joblistings WHERE jobtype='{$jobtypeSearchID}' ORDER BY dateposted DESC";
        }elseif($jobtypeSearchID=="empty" && $categorySearchID !== "empty"){
            $query = "SELECT * FROM joblistings WHERE category='{$categorySearchID}' ORDER BY dateposted DESC";
        }elseif($categorySearchID!=="empty" && $jobtypeSearchID!=="empty") {
            $query = "SELECT * FROM joblistings WHERE jobtype='{$jobtypeSearchID}' AND category='{$categorySearchID}' ORDER BY dateposted DESC";
        }  
    }else{
        if ($categorySearchID=="empty" && $jobtypeSearchID=="empty") {
            $query = "SELECT * FROM joblistings WHERE location='{$locationSearchID}' ORDER BY dateposted DESC";
        }elseif($jobtypeSearchID!=="empty" && $categorySearchID == "empty") { 
            $query = "SELECT * FROM joblistings WHERE jobtype='{$jobtypeSearchID}' AND location='{$locationSearchID}' ORDER BY dateposted DESC";
        }elseif($jobtypeSearchID=="empty" && $categorySearchID !== "empty"){
            $query = "SELECT * FROM joblistings WHERE category='{$categorySearchID}' AND location='{$locationSearchID}' ORDER BY dateposted DESC";
        }elseif($categorySearchID!=="empty" && $jobtypeSearchID!=="empty") {
            $query = "SELECT * FROM joblistings WHERE jobtype='{$jobtypeSearchID}' AND category='{$categorySearchID}' AND location='{$locationSearchID}' ORDER BY dateposted DESC";
        }
    }

    return $query;
}
?>