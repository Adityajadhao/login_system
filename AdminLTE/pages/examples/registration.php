<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];

        $email_query = "SELECT * FROM task4data WHERE email='$email' ";
        $email_query_run = mysqli_query($conn, $email_query);
        if (mysqli_num_rows($email_query_run) > 0) {



            echo "email already exist";
        } else {
            $name = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            // validation successfully
            //$hashed_password = md5($password);
            $stmt = $conn->prepare("insert into task4data(fullname, email, pasword) values(?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $password);
            $execval = $stmt->execute();
            echo "Registered successfully";
        }

        $conn->close();
    }
}

     


        

        //echo "Registered successfully";

        // $return =  array(
        //     'statuscode' => "201",
        //     'message' => "Registered successfully"
        // );
        // http_response_code(201);
        // echo $execval;


        
        //header('Location:http://localhost/LoginRegisterPass/AdminLTE/pages/examples/login.html');


        // <META HTTP-EQUIV="Refresh" CONTENT="2; URL=http://localhost/LoginRegisterPass/AdminLTE/pages/examples/login.html">


        //print_r(json_encode($return));
