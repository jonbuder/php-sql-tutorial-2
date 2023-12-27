<?php

if(isset($_REQUEST['deletePerson'])) {
    deletePerson();
}

function deletePerson(){
    require "db.php";
    //print_r($_REQUEST);

    $selectedPersonID = $_REQUEST['selectedPersonID'];

    $sanitizedPersonID = htmlspecialchars($selectedPersonID);
    $sqlSelect = "SELECT * FROM people WHERE id = $sanitizedPersonID";
    $result = sqlsrv_query($conn, $sqlSelect);
    if($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        echo 'Proceeding to delete person with ID # ' . $sanitizedPersonID . '<br>';
        $sql = "DELETE FROM people WHERE id = ?";
        $stmt = sqlsrv_prepare($conn, $sql, array(&$selectedPersonID));
        if(!$stmt) {
            die(print_r(sqlsrv_errors(), true));
        }
        if(sqlsrv_execute($stmt) === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            echo 'Successfully deleted person with ID #' . $selectedPersonID;
            print_r(sqlsrv_errors(), true);
        }
    } else {
        echo 'No person found with ID # ' . $sanitizedPersonID . '<br>';
    }




    
}

?>