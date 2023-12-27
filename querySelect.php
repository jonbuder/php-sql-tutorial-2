<?php

function showPeople() {
    require "db.php";
    $sql = "SELECT ID, FirstName, LastName, FavoriteColor FROM people";
    $stmt = sqlsrv_query($conn, $sql);
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo '#' . $row['ID'] . ' - ' . $row['FirstName'] . ' ' . $row['LastName'] . ' - ' . $row['FavoriteColor'] . '<br>';
    }
}

function selectPeople() {
    require "db.php";
    $sql = "SELECT ID, FirstName, LastName, FavoriteColor FROM people";
    $stmt = sqlsrv_query($conn, $sql);
    echo '<select name="selectedPersonID">';
    echo '<option value="" selected disabled hidden>Choose a person</option>';
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        //echo '#' . $row['ID'] . ' - ' . $row['FirstName'] . ' ' . $row['LastName'] . ' - ' . $row['FavoriteColor'] . '<br>';
        echo '<option value="' . $row['ID'] . '">' . $row['FirstName'] . ' ' . $row['LastName'] . ' - current favorite color: ' . $row['FavoriteColor'] . '</option>';
    }
    echo '</select>';
}

function showColorTable() {
    require "db.php";
    $sql = "SELECT ID, FirstName, LastName, FavoriteColor FROM people ORDER BY FirstName ASC";
    $stmt = sqlsrv_query($conn, $sql);
    echo '<table>';
    echo '<tr><th>Name</th><th>Favorite Color</th></tr>';
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
        echo '<td style="background-color: ' . $row['FavoriteColor'] . '"></td>';
        echo '</tr>';
    }
    echo '</table>';
}

?>