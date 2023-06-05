<?php
    session_start();
    $error = "";
        
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: mainpage.php");
        exit;
    }

    if (isset($_POST['change'])) {
        $mysqli = new mysqli("localhost", "root", "", "csrs");

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
        
        <nav class="navbar navbar-expand-sm body bg-primary m-3 rounded rounded-2 fixed-top" style="width: 97%">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">
                    <img src="../logo_upmin_2.png" id="logo" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top">
                    UPMIN CSRS
                </a>
                <div class="navbar-collapse justify-content-end" id="">
                    <div class="row justify-content-end navbar-nav btn-group" style="width: 95%">
                        <div class="col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white"
                                href="#">Home</button>
                        </div>
                        <div class="dropdown col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Sections</button>
                            <ul class="dropdown-menu dropdown-menu-start w-auto p-1">
                                <li><a href="../pages_menu/about.php">about</a></li>
                                <li><a href="../pages_menu/privacy.php">privacy notice</a></li>
                                <li><a href="../pages_menu/up_email.php">up email</a></li>
                                <li><a href="../pages_menu/faq.php">faq</a></li>
                            </ul>
                        </div>
                        <div class="dropdown col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Student Info</button>
                            <ul class="dropdown-menu dropdown-menu-start w-auto p-1">
                                <li><a href="../pages_student_info/sdis.php">sdis</a></li>
                                <li><a href="../pages_student_info/prospectus.php">prospectus & grades</a></li>
                                <li><a href="../pages_student_info/sched.php">class schedule</a></li>
                                <li><a href="../pages_student_info/residency.php">residency</a></li>
                                <li><a href="../pages_student_info/matric.php">matriculation</a></li>
                                <li><a href="../pages_student_info/calendar.php">personal calendar</a></li>
                            </ul>
                        </div>
                        <div class="dropdown col-3">
                            <button class="w-100 btn btn-primary text-center nav-link text-white dropdown-toggle active"
                                data-bs-toggle="dropdown" aria-expanded="false" href="#">Account</button>
                            <ul class="dropdown-menu dropdown-menu-start w-auto p-1">
                                <li><a href="pwchange.php">change password</a></li>
                                <li><a href="../mainpage.php">log out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        
        <div id="space"></div>

        <form method="POST" class="border border-2 rounded rounded-2 border-primary m-2 p-3 w-50 mx-auto">
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

        <script src="../popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>