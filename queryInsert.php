<?php

if(isset($_REQUEST['insertPerson'])) {
    insertPerson();
}

function insertPerson() {
    require "db.php";
    //print_r($_REQUEST);

    $newFirstName = $_REQUEST['newFirstName'];
    $newLastName = $_REQUEST['newLastName'];
    $newFavoriteColor = $_REQUEST['newFavoriteColor'];

    $sql = "INSERT INTO people (FirstName, LastName, FavoriteColor) VALUES (?, ?, ?)";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$newFirstName, &$newLastName, &$newFavoriteColor));

    if (!$stmt) {
        die(print_r(sqlsrv_errors(), true));
    }

    if(sqlsrv_execute($stmt) === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo 'Successfully added person.';
    }
    


}

?>