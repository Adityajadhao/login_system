<?php

include 'connection.php';
$email = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (isset($_POST['email'])) {

        $email = $_POST['email'];
        $sql = "SELECT * FROM task4data where  email='$email'";
        $results = mysqli_query($conn, $sql);
        $row  = mysqli_fetch_array($results);

        if (is_array($row)) {
            $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $shfl = str_shuffle($comb);
            $pwd = substr($shfl, 0, 7);

            $sql = "UPDATE task4data SET pasword='$pwd' WHERE email='$email'";
            mysqli_query($conn, $sql);
            echo "new temp Password is:" . $pwd;
            echo "<a href = 'login.php'>click here to go on login page</a>";
        } else {
            echo "not updated";
        }
    }
}
