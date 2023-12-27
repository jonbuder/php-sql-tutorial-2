<?php

if(isset($_REQUEST['updateFavoriteColor'])) {
    updateFavoriteColor();
}

function updateFavoriteColor(){
    require "db.php";
    //print_r($_REQUEST);

    $selectedPersonID = $_REQUEST['selectedPersonID'];
    $updatedFavoriteColor = $_REQUEST['updatedFavoriteColor'];


    $sql = "UPDATE people SET FavoriteColor = ? WHERE id = ?";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$updatedFavoriteColor, &$selectedPersonID));
    if(!$stmt) {
        die(print_r(sqlsrv_errors(), true));
    }
    if(sqlsrv_execute($stmt) === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo 'Successfully updated person with ID #' . $selectedPersonID;
    }
    
}

?>