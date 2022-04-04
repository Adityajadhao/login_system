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

            // $return = array(
            //     'statuscode' => 200,
            //     'message' => "login Sucessfull. New Password is:" . $pwd
            // );
            // http_response_code(200);
            echo "<b>Temp Password :<b>" . $pwd;
            // echo "<a href = 'login.php'>click here to go on login page</a>";
        } else {
            // $return = array(
            //     'statuscode' => 201,
            //     'message' => "invalid credentials."
            // );
            // http_response_code(201);

            echo "<b>EMAIL NOT FOUND<b>";
        }
        //print_r(json_encode($return));
        mysqli_close($conn);
    }
}
