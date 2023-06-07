<?php
    session_start();
    $error = "";
        
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: mainpage.php");
        exit;
    }

    $mysqli = new mysqli("localhost", "root", "", "csrs");

    if (isset($_POST['change'])) {
        if (mysqli_connect_errno()) {
            echo "failed connection: " . mysqli_connect_error();
            exit();
        }

        $query = "SELECT `password` FROM student_info WHERE stud_num = '{$_SESSION["studentnumber"]}'";
        $result = $mysqli -> query($query);
        $oldpw = $result -> fetch_assoc();

        if ($oldpw["password"] === $_POST["oldPassword"]) {
            if (!empty($_POST["newPassword"]) == true or !empty($_POST["confirmPassword"]) == true) {
                if ($_POST["newPassword"] === $_POST["confirmPassword"]) {
                    $query = "UPDATE student_info SET `password` = '{$_POST["newPassword"]}' WHERE stud_num = '{$_SESSION["studentnumber"]}'";
                    $mysqli -> query($query);
                    header('location: ../mainpage.php');
                    exit;
                } else $error = "Confirm does not match new password.<br/><br/>";
            } else $error = "Blank passwords are invalid.<br/><br/>";
        } else $error = "Wrong password.<br/><br/>";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>UP Mindanao CSRS Website</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../stylesheet.css">
        <link rel="shortcut icon" href="../favicon.ico">
    
        <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="../scss/custom_colors.css" rel="stylesheet">
    </head>

    <body>
        
        <form action="../mainpage_loggedin_bootstrappified.php">
            <button class="fixed-top btn btn-primary m-3" style="width: 5%" href="../mainpage_loggedin_bootstrappified.php">Back</button>
        </form>

        <div class="position-absolute row w-100 h-100">
            <form method="POST" class="border border-2 rounded rounded-2 border-primary m-2 p-3 w-50 mx-auto my-auto">
                <h2>Password Change for <?php echo htmlspecialchars($_SESSION["studentnumber"]) ?></h2>
                <input class="form-control" id="oldPassword" name="oldPassword" type="password">
                <label class="form-text mb-2" for="oldPassword">Old Password</label>
                <input class="form-control" id="newPassword" name="newPassword" type="password">
                <label class="form-text mb-2" for="newPassword">New Password</label>
                <input class="form-control" id="confirmPassword" name="confirmPassword" type="password">
                <label class="form-text mb-4" for="confirmPassword">Confirm Password</label>
                <br><span class="form-text mb-4 text-danger"><?php echo $error; ?></span>
                <button class="btn btn-secondary" name="change">Submit</button>
            </form>
        </div>

        

        <script src="../popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>