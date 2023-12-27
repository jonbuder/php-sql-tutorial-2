<?php

require "querySelect.php";

//showPeople();

?>


<html>
    <body>
        <p>Insert New Person</p>
        <form action="queryInsert.php">
            <input type="hidden" name="insertPerson" value="1">
            <label for="newFirstName">New First Name:</label>
            <br>
            <input type="text" name="newFirstName">
            <br>
            <label for="newLastName">New Last Name:</label>
            <br>
            <input type="text" name="newLastName">
            <br>
            <label for="newFavoriteColor">New Favorite Color:</label>
            <br>
            <input type="text" name="newFavoriteColor">
            <br>
            <input type="submit">
        </form>
        <hr>
        <p>Modify Person</p>
        <form action="queryUpdate.php">
            <input type="hidden" name="updateFavoriteColor" value="1">
            <?php selectPeople(); ?>
            <br>
            <label for="updatedFavoriteColor">Updated Favorite Color:</label>
            <br>
            <input type="text" name="updatedFavoriteColor">
            <br>
            <input type="submit">
        </form>
        <hr>
        <p>Delete Person</p>
        <form action="queryDelete.php">
            <input type="hidden" name="deletePerson" value="1">
            <?php selectPeople(); ?>
            <br>
            <input type="submit" value="DELETE PERSON" style="color: red; font-weight: bold;">
        </form>
        <hr>
        <p>Table of people with favorite colors</p>
        <?php showColorTable(); ?>

    </body>
</html>