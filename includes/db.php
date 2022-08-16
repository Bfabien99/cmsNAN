<?php
    //Create an array db to store all db connection information
    $db["db_host"] = "localhost";
    $db["db_user"] = "root";
    $db["db_pass"] = "";
    $db["db_name"] = "cms";

    //Transform to constant all db array key
    foreach ($db as $key => $value){
        define(strtoupper($key), $value);
    }

    //Connect to db with mysqli
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if($connection){
        return $connection;
    }else{
        die("Could not connect to database");
    }
?>