<?php 

/*
*Format the date
*/

function formatDate($date) {
    $date = date_create($date);
    return date('F j, Y');
}

/*
shorten job listing for display
*/
function concatText($text) {
    return substr($text, 0, 350);
}

/*
*backend messaging
*/
function completeMsg($msg) {   
    switch ($msg) {
        case '':
            break;
        case 'deleted':
            $msg = 'Item Deleted';
            break;
        case 'added':
            $msg = 'Item Added Successfully';
            break;
        case 'updated':
            $msg = 'Item Updated Successfully';
            break;
        default:
            $msg = 'An error occurred';
            break;
    }
    return $msg;
}
