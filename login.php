<?php
session_start();

require 'db/dbconn.php';



if (isset($_POST['AdminLogin'])) {
    require 'db/Sanitaize.php';

    // User is not logged in, process login form
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Get username and password from POST request
        $ADlogEmail = sanitizeInput($_POST['ADlogEmail']);
        $ADlogPass = sanitizeInput($_POST['ADlogPass']);


        // Check if user exists in database
        $sql = "SELECT * FROM adminuser WHERE AdminEmail = '$ADlogEmail'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {

            $row = $result->fetch_assoc();

            $storedPassword = $row['AdminPassword'];

            if (password_verify($ADlogPass, $storedPassword)) {
                // echo 'Login successful.';
                // User exists, login user
                $_SESSION['ADlogged_in'] = true;
                $_SESSION['AdminEmail'] = $AdminEmail;
                // $_SESSION['DUserName'] = $row['DUserName'];
                // $_SESSION['email'] = $row['email'];
                // $_SESSION['name'] = $row['name'];

                // Redirect to home page
                header('Location: admin.php');
            } else {
                echo '<script>alert("Invalid PAssword")</script>';

                mysqli_close($conn);
                header("Refresh:0");
                exit;
            }

        } else {
            // User does not exist, show error message
            echo '<script>alert("Invalid Login Cerdetional")</script>';

            mysqli_close($conn);
            header("Refresh:0");
            exit;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/images/favicon_transp.png" />
    <title>Login</title>

    <style>
        body {
            padding: 0;
            margin: 0;
        }

        .vid-container {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .bgvid {
            position: absolute;
            left: 0;
            top: 0;
            width: 100vw;
        }

        .inner-container {
            width: 400px;
            height: 400px;
            border-radius: 8px;
            position: absolute;
            top: calc(50vh - 200px);
            left: calc(50vw - 200px);
            overflow: hidden;
        }

        .bgvid.inner {
            top: calc(-50vh + 200px);
            left: calc(-50vw + 200px);
            filter: url("data:image/svg+xml;utf9,<svg%20version='1.1'%20xmlns='http://www.w3.org/2000/svg'><filter%20id='blur'><feGaussianBlur%20stdDeviation='10'%20/></filter></svg>#blur");
            -webkit-filter: blur(10px);
            -ms-filter: blur(10px);
            -o-filter: blur(10px);
            filter: blur(10px);
        }

        .box {
            position: absolute;
            height: 100%;
            width: 100%;
            font-family: Helvetica;
            color: #fff;
            background: rgba(0, 0, 0, 0.13);
            padding: 30px 0px;
        }

        .box h1 {
            text-align: center;
            margin: 30px 0;
            font-size: 30px;
        }

        .box input {
            display: block;
            width: 300px;
            margin: 20px auto;
            padding: 15px;
            border-radius: 3px;
            background: rgba(0, 0, 0, 0.2);
            color: #fff;
            border: 0;
        }

        .box input:focus,
        .box input:active,
        .box button:focus,
        .box button:active {
            outline: none;
        }

        .box button {
            background: #2ecc71;
            border: 0;
            color: #fff;
            padding: 10px;
            font-size: 20px;
            width: 330px;
            margin: 20px auto;
            display: block;
            cursor: pointer;
            border-radius: 5px;
        }

        .box button:active {
            background: #27ae60;
        }

        .box p {
            font-size: 14px;
            text-align: center;
        }

        .box p span {
            cursor: pointer;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="vid-container">
        <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
            <source src="Video/pexels-zura-narimanishvili-5490419-1920x1080-25fps.mp4" type="video/mp4" />
        </video>
        <div class="inner-container">
            <video class="bgvid inner" autoplay="autoplay" muted="muted" preload="auto" loop>
                <source src="Video/pexels-zura-narimanishvili-5490419-1920x1080-25fps.mp4" type="video/mp4" />
            </video>
            <div class="box">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="mx-1 mx-md-4">
                    <h1>Admin Login</h1>
                    <input type="text" name="ADlogEmail" placeholder="Enter Your Username" required />
                    <input type="text" name="ADlogPass" placeholder="Enter Your Password" required />
                    <button type="submit" name="AdminLogin">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>