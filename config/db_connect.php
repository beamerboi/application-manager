<?php

    // connect to the database
    $conn = mysqli_connect('localhost', 'owl', 'coding230801', 'myuni');

    // check connection
    if(!$conn){
        echo 'Connection error: '. mysqli_connect_error();
    }
    ?>
