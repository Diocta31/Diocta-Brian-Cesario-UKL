<?php
$databaseHost = "localhost";
$databaseName = "project sija";
$databaseUsername = "root";
$databasePassword = "";

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

function hpengguna($id)
{
    global $mysqli;

    mysqli_query($mysqli, "DELETE FROM users where id_user = $id");

    return mysqli_affected_rows($mysqli);
}
