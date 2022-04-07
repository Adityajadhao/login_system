<?php
include 'connection.php';
session_start();
if (isset($_COOKIE))
    $email = '';
$password = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];



        $check = mysqli_query($conn, "select * from task4data where email='$email' and pasword='$password'");
        if (mysqli_num_rows($check) > 0) {

            $_SESSION["password"] = $password;
            $_SESSION["email"] = $email;
            // $remember = $_POST['remember'];

            // if ($remember == 1) {
            //     setcookie('email', $email, time() + 60 * 60 * 24, "/");
            //     setcookie('pass', $password, time() + 60 * 60 * 24, "/");
            // }


            // echo "getting";
            $return = array(
                'statuscode' => 200,
                'message' => "login Sucessfull."
            );
            http_response_code(200);
            //echo json_encode(array("statusCode" => 200));
            //echo "<script>alert('login successfull')</script>";
            //header("location:http://localhost/LoginRegisterPass/AdminLTE/index3.html");
        } else {
            $return = array(
                'statuscode' => 201,
                'message' => "invalid credentials."
            );
            http_response_code(201);
            //echo json_encode(array("statusCode" => 201));
            // echo "not getting";
        }

        print_r(json_encode($return));
        mysqli_close($conn);
    }
}
