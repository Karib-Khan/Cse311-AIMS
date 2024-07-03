<?php

session_start();
include("connections.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {



    $email = $_POST['email'];

    $nid = $_POST['password'];




    if (
        !empty($email) && !empty($nid)
    ) {

        $query = "SELECT * FROM admin WHERE email='$email' limit 1";

        $result = mysqli_query($connect, $query);
        // echo ("Its working");

        if ($result) {

            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['nid_pass'] === $nid) {

                    $_SESSION['user'] = $user_data['email'];


                    header("Location: Admin-panel.php");
                    exit;

                }

            }
        }
        



    } else {
        echo ("Wrong Email Or Password");

    }



}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/login-styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
        <header>Login Form</header>
        <form action="#" method="POST">
            <div class="field email">
                <div class="input-area">
                    <input type="text" name="email" placeholder="Email" />
                    <i class="icon fas fa-envelope"></i>
                    <i class="error error-icon fas fa-exclamation-circle"></i>
                </div>
                <div class="error error-txt">ID can't be blank</div>
            </div>
            <div class="field password">
                <div class="input-area">
                    <input type="text" name="password" placeholder="Password" />
                    <i class="icon fas fa-lock"></i>
                    <i class="error error-icon fas fa-exclamation-circle"></i>
                </div>
                <div class="error error-txt">Password can't be blank</div>
            </div>
            <!-- <div class="pass-txt"><a href="#">Forgot password?</a></div> -->
            <input type="submit" value="Login" />
        </form>
        <a href="index.php" class="back-btn"><span>Go Back</span></a>
        <!-- <div class="sign-txt">Not yet member? <a href="#">Signup now</a></div> -->
    </div>

    <!-- <script src="script.js"></script> -->
</body>

</html>